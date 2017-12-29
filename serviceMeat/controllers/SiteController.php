<?php

namespace app\controllers;

use app\models\Hotels;
use app\models\OfferHotels;
use app\models\OfferPrises;
use app\models\Offers;
use app\models\OfferServices;
use app\models\OfferTransports;
use app\models\Prises;
use app\models\Services;
use app\models\Transports;
use app\modules\MicroTimer;
use app\modules\XMLIterator\XMLElementIterator;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\httpclient\Client;
use yii\httpclient\XmlParser;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //return $this->render('index');
        return $this->redirect(['offers/index']);
    }
    public function actionPars()
    {
        $request = Yii::$app->request;

        if ($request->post('parsedUrl')) {

            $url = $request->post('parsedUrl');
            //$url = 'http://xml2.voyage.kiev.ua/192426.xml'; // 90M
            //$url = 'http://xml2.voyage.kiev.ua/144435.xml'; // 10M
            //$url = 'http://xml2.voyage.kiev.ua/142791.xml'; // 200 KB

            $MicroTimer = new MicroTimer();
            $exp = explode('/', $url);
            $filename = '../temp/' . end($exp);
            copy($url, $filename);
            $MicroTimer->printTimer();


            if ($filename != '') {
                $MicroTimer->start();

                $reader = new \XMLReader();
                $reader->open($filename, 'windows-1251');

                $it = new XMLElementIterator($reader);

                foreach ($it as $message) {

                    if ($message->name == 'OFFER') {
                        $offers = $message->getSimpleXMLElement();
                        $offer = json_decode(json_encode($offers), true);

                        $offerModel = new Offers;
                        $offerModel->attributes = array_change_key_case($offer['@attributes'], CASE_LOWER);
                        if ($offerModel->save(false)) {
                            foreach ($offer['HOTELS']['HOTEL'] as $hotel) {
                                $hotelModel = new Hotels;
                                $hotelModel->attributes = array_change_key_case($hotel, CASE_LOWER);
                                if ($hotelModel->save(false)) {
                                    $offerHotelModel = new OfferHotels;
                                    $offerHotelModel->offer_id = $offerModel->id;
                                    $offerHotelModel->hotel_id = $hotelModel->id;
                                    $offerHotelModel->save();
                                }
                            }
                            foreach ($offer['TRANSPORTS']['TRANSPORT'] as $transport) {
                                $transportModel = new Transports;
                                $transportModel->attributes = array_change_key_case($transport['@attributes'], CASE_LOWER);
                                if ($transportModel->save(false)) {
                                    $offerTransportModel = new OfferTransports;
                                    $offerTransportModel->offer_id = $offerModel->id;
                                    $offerTransportModel->transport_id = $transportModel->id;
                                    $offerTransportModel->save();
                                }
                            }
                            foreach ($offer['SERVICES']['SERVICE'] as $service) {
                                $serviceModel = new Services;
                                $serviceModel->attributes = array_change_key_case($service['@attributes'], CASE_LOWER);
                                if ($serviceModel->save(false)) {
                                    $offerServicesModel = new OfferServices;
                                    $offerServicesModel->offer_id = $offerModel->id;
                                    $offerServicesModel->service_id = $serviceModel->id;
                                    $offerServicesModel->save();
                                }
                            }
                            foreach ($offer['PRICES']['PRICE'] as $price) {
                                if (isset($price['@attributes'])) {
                                    $priceModel = new Prises;
                                    $priceModel->idn = $price['@attributes']['ID'];
                                    $priceModel->attributes = array_change_key_case($price['@attributes'], CASE_LOWER);
                                    if ($priceModel->save(false)) {
                                        $offerPrisesModel = new OfferPrises;
                                        $offerPrisesModel->offer_id = $offerModel->id;
                                        $offerPrisesModel->prise_id = $priceModel->id;
                                        $offerPrisesModel->save();
                                    }
                                }
                            }
                        }
                    }

                    $MicroTimer->printTimer();
                }
            }
        }
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
