<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transports;

/**
 * TransportsSearch represents the model behind the search form about `app\models\Transports`.
 */
class TransportsSearch extends Transports
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'beg', 'end', 'type', 'trc', 'cnt'], 'integer'],
            [['name', 'class', 'place', 'townfr', 'townto'], 'safe'],
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
        $query = Transports::find();

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
            'type' => $this->type,
            'trc' => $this->trc,
            'cnt' => $this->cnt,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'townfr', $this->townfr])
            ->andFilterWhere(['like', 'townto', $this->townto]);

        return $dataProvider;
    }
}
