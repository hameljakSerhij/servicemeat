<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hotels".
 *
 * @property integer $id
 * @property integer $beg
 * @property integer $end
 * @property string $name
 * @property integer $htc
 * @property string $star
 * @property string $room
 * @property integer $rmc
 * @property string $place
 * @property integer $plc
 * @property string $meal
 * @property integer $mlc
 * @property string $town
 * @property integer $cnt
 *
 * @property OfferHotels[] $offerHotels
 */
class Hotels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beg', 'end', 'name', 'htc', 'star', 'room', 'rmc', 'place', 'plc', 'meal', 'mlc', 'town', 'cnt'], 'required'],
            [['beg', 'end', 'htc', 'rmc', 'plc', 'mlc', 'cnt'], 'integer'],
            [['name', 'town'], 'string', 'max' => 255],
            [['star', 'room', 'place', 'meal'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'beg' => 'Beg',
            'end' => 'End',
            'name' => 'Name',
            'htc' => 'Htc',
            'star' => 'Star',
            'room' => 'Room',
            'rmc' => 'Rmc',
            'place' => 'Place',
            'plc' => 'Plc',
            'meal' => 'Meal',
            'mlc' => 'Mlc',
            'town' => 'Town',
            'cnt' => 'Cnt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferHotels()
    {
        return $this->hasMany(OfferHotels::className(), ['hotel_id' => 'id']);
    }
}
