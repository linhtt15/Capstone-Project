<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "station".
 *
 * @property integer $station_id
 * @property string $station_name
 *
 * @property Contract[] $contracts
 * @property Wagon[] $wagons
 * @property WagonHistory[] $wagonHistories
 */
class Station extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['station_name'], 'required'],
            [['station_name'], 'string', 'max' => 45],
            [['station_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'station_id' => 'Station ID',
            'station_name' => 'Ga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['station_station_id' => 'station_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagons()
    {
        return $this->hasMany(Wagon::className(), ['station_station_id' => 'station_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagonHistories()
    {
        return $this->hasMany(WagonHistory::className(), ['station_station_id' => 'station_id']);
    }
}
