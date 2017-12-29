<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transports".
 *
 * @property integer $id
 * @property integer $beg
 * @property integer $end
 * @property integer $type
 * @property string $name
 * @property integer $trc
 * @property string $class
 * @property string $place
 * @property string $townfr
 * @property string $townto
 * @property integer $cnt
 *
 * @property OfferTransports[] $offerTransports
 */
class Transports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beg', 'end', 'type', 'name', 'trc', 'class', 'place', 'townfr', 'townto', 'cnt'], 'required'],
            [['beg', 'end', 'type', 'trc', 'cnt'], 'integer'],
            [['name', 'class', 'place', 'townfr', 'townto'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'name' => 'Name',
            'trc' => 'Trc',
            'class' => 'Class',
            'place' => 'Place',
            'townfr' => 'Townfr',
            'townto' => 'Townto',
            'cnt' => 'Cnt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferTransports()
    {
        return $this->hasMany(OfferTransports::className(), ['transport_id' => 'id']);
    }
}
