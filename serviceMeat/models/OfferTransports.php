<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offer_transports".
 *
 * @property integer $id
 * @property integer $offer_id
 * @property integer $transport_id
 *
 * @property Offers $offer
 * @property Transports $transport
 */
class OfferTransports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer_transports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'transport_id'], 'required'],
            [['offer_id', 'transport_id'], 'integer'],
            [['offer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Offers::className(), 'targetAttribute' => ['offer_id' => 'id']],
            [['transport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transports::className(), 'targetAttribute' => ['transport_id' => 'id']],
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
            'transport_id' => 'Transport ID',
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
    public function getTransport()
    {
        return $this->hasOne(Transports::className(), ['id' => 'transport_id']);
    }
}
