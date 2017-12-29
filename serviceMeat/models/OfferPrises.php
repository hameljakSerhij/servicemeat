<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offer_prises".
 *
 * @property integer $id
 * @property integer $offer_id
 * @property integer $prise_id
 *
 * @property Offers $offer
 * @property Prises $prise
 */
class OfferPrises extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer_prises';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'prise_id'], 'required'],
            [['offer_id', 'prise_id'], 'integer'],
            [['offer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Offers::className(), 'targetAttribute' => ['offer_id' => 'id']],
            [['prise_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prises::className(), 'targetAttribute' => ['prise_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'offer_id' => 'Offer ID',
            'prise_id' => 'Prise ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffer()
    {
        return $this->hasOne(Offers::className(), ['id' => 'offer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrise()
    {
        return $this->hasOne(Prises::className(), ['id' => 'prise_id']);
    }
}
