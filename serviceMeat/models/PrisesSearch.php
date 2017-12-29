<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prises;

/**
 * PrisesSearch represents the model behind the search form about `app\models\Prises`.
 */
class PrisesSearch extends Prises
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idn', 'n', 'val'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Prises::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idn' => $this->idn,
            'date' => $this->date,
            'n' => $this->n,
            'val' => $this->val,
        ]);

        return $dataProvider;
    }
}
