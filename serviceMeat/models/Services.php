<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property integer $beg
 * @property integer $end
 * @property integer $type
 * @property string $name
 * @property integer $cnt
 *
 * @property OfferServices[] $offerServices
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beg', 'end', 'type', 'name', 'cnt'], 'required'],
            [['beg', 'end', 'type', 'cnt'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'cnt' => 'Cnt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferServices()
    {
        return $this->hasMany(OfferServices::className(), ['service_id' => 'id']);
    }
}
