<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DateRepair;

/**
 * SearchDateRepair represents the model behind the search form about `app\models\DateRepair`.
 */
class SearchDateRepair extends DateRepair
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_date_repair', 'wagon_wagon_id', 'brand_repair_brand_repair_id'], 'integer'],
            [['begin_day', 'repair_day', 'repair_complete_day'], 'safe'],
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
        $query = DateRepair::find();

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
            'id_date_repair' => $this->id_date_repair,
            'begin_day' => $this->begin_day,
            'repair_day' => $this->repair_day,
            'repair_complete_day' => $this->repair_complete_day,
            'wagon_wagon_id' => $this->wagon_wagon_id,
            'brand_repair_brand_repair_id' => $this->brand_repair_brand_repair_id,
        ]);

        return $dataProvider;
    }
}
