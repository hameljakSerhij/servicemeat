<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hotels;

/**
 * HotelsSearch represents the model behind the search form about `app\models\Hotels`.
 */
class HotelsSearch extends Hotels
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'beg', 'end', 'htc', 'rmc', 'plc', 'mlc', 'cnt'], 'integer'],
            [['name', 'star', 'room', 'place', 'meal', 'town'], 'safe'],
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
        $query = Hotels::find();

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
            'beg' => $this->beg,
            'end' => $this->end,
            'htc' => $this->htc,
            'rmc' => $this->rmc,
            'plc' => $this->plc,
            'mlc' => $this->mlc,
            'cnt' => $this->cnt,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'star', $this->star])
            ->andFilterWhere(['like', 'room', $this->room])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'meal', $this->meal])
            ->andFilterWhere(['like', 'town', $this->town]);

        return $dataProvider;
    }
}
