<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property integer $id
 * @property string $operator
 * @property string $spo
 * @property string $date
 * @property string $tour
 * @property integer $adl
 * @property integer $chd
 * @property integer $inf
 * @property string $currency
 * @property string $country
 *
 * @property OfferHotels[] $offerHotels
 * @property OfferPrises[] $offerPrises
 * @property OfferServices[] $offerServices
 * @property OfferTransports[] $offerTransports
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operator', 'spo', 'date', 'tour', 'adl', 'chd', 'inf', 'currency', 'country'], 'required'],
            [['date'], 'safe'],
            [['tour'], 'string'],
            [['adl', 'chd', 'inf'], 'integer'],
            [['operator', 'spo', 'country'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'operator' => 'Operator',
            'spo' => 'Spo',
            'date' => 'Date',
            'tour' => 'Tour',
            'adl' => 'Adl',
            'chd' => 'Chd',
            'inf' => 'Inf',
            'currency' => 'Currency',
            'country' => 'Country',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferHotels()
    {
        return $this->hasMany(OfferHotels::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferPrises()
    {
        return $this->hasMany(OfferPrises::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferServices()
    {
        return $this->hasMany(OfferServices::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferTransports()
    {
        return $this->hasMany(OfferTransports::className(), ['offer_id' => 'id']);
    }
}
