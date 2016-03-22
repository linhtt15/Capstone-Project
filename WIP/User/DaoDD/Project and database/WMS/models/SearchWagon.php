<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wagon;

/**
 * SearchWagon represents the model behind the search form about `app\models\Wagon`.
 */
class SearchWagon extends Wagon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wagon_id', 'wagon_number'], 'integer'],
            [['created_year', 'start_date', 'wagon_status_id_status', 'station_station_id', 'kind_of_wagon_kind_id'], 'safe'],
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
        $query = Wagon::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('wagonStatusIdStatus');
        $query->joinWith('stationStation');
        $query->joinWith('kindOfWagonKind');
        $query->andFilterWhere([
            'wagon_id' => $this->wagon_id,
            'wagon_number' => $this->wagon_number,
            'created_year' => $this->created_year,
            'start_date' => $this->start_date,
           // 'wagon_status_id_status' => $this->wagon_status_id_status,
           // 'station_station_id' => $this->station_station_id,
            //'kind_of_wagon_kind_id' => $this->kind_of_wagon_kind_id,
        ]);
        $query->andFilterWhere(['like','wagon_status.status_id',$this->wagon_status_id_status]);
        $query->andFilterWhere(['like','station.station_id',$this->station_station_id]);
        $query->andFilterWhere(['like','kind_of_wagon.kind_id',$this ->kind_of_wagon_kind_id]);
        return $dataProvider;
    }
}
