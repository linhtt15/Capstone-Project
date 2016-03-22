<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Station;

/**
 * SearchStation represents the model behind the search form about `app\models\Station`.
 */
class SearchStation extends Station
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['station_id'], 'integer'],
            [['station_name'], 'safe'],
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
        $query = Station::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'station_id' => $this->station_id,
        ]);

        $query->andFilterWhere(['like', 'station_name', $this->station_name]);

        return $dataProvider;
    }
}
