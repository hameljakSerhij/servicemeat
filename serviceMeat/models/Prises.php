<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prises".
 *
 * @property integer $id
 * @property integer $idn
 * @property string $date
 * @property integer $n
 * @property integer $val
 *
 * @property OfferPrises[] $offerPrises
 */
class Prises extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prises';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idn', 'date', 'n', 'val'], 'required'],
            [['idn', 'n', 'val'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idn' => 'Idn',
            'date' => 'Date',
            'n' => 'N',
            'val' => 'Val',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferPrises()
    {
        return $this->hasMany(OfferPrises::className(), ['prise_id' => 'id']);
    }
}
