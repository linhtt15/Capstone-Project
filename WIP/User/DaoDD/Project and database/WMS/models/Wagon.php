<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wagon".
 *
 * @property integer $wagon_id
 * @property integer $wagon_number
 * @property string $created_year
 * @property string $start_date
 * @property integer $wagon_status_id_status
 * @property integer $station_station_id
 * @property integer $kind_of_wagon_kind_id
 *
 * @property DateRepair[] $dateRepairs
 * @property Lading[] $ladings
 * @property KindOfWagon $kindOfWagonKind
 * @property Station $stationStation
 * @property WagonStatus $wagonStatusIdStatus
 * @property WagonHistory[] $wagonHistories
 */
class Wagon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wagon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wagon_number', 'created_year', 'start_date', 'wagon_status_id_status', 'station_station_id', 'kind_of_wagon_kind_id'], 'required','message'=>'Không được để trống'],
            [['wagon_number'], 'integer'],
            [['created_year', 'start_date'], 'safe'],
            ['start_date', 'date', 'format' => 'yyyy-mm-dd','message'=>'Sai định dạng ngày! Xin nhập lại theo định dạng yyyy-mm-dd'],
            [['wagon_number'], 'unique', 'message'=> 'Số hiệu toa đã tồn tại'],
            [['wagon_number'],'match', 'pattern' => '/^(\d{3})(\d{3})$/', 'message' => 'Số hiệu toa phải là 1 số có 6 chữ số.', 'when' => function ($model) {
                return !isset($model->wagon_number);
            }],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wagon_id' => 'Wagon ID',
            'wagon_number' => 'Số hiệu toa',
            'created_year' => 'Năm chế tạo',

            'start_date' => 'Ngày bắt đầu sử dụng',
            'wagon_status_id_status' => 'Trạng thái toa',
            'station_station_id' => 'Vị trí hiện tại',
            'kind_of_wagon_kind_id' => 'Loại toa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDateRepairs()
    {
        return $this->hasMany(DateRepair::className(), ['wagon_wagon_id' => 'wagon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLadings()
    {
        return $this->hasMany(Lading::className(), ['wagon_wagon_id' => 'wagon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKindOfWagonKind()
    {
        return $this->hasOne(KindOfWagon::className(), ['kind_id' => 'kind_of_wagon_kind_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStationStation()
    {
        return $this->hasOne(Station::className(), ['station_id' => 'station_station_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagonStatusIdStatus()
    {
        return $this->hasOne(WagonStatus::className(), ['status_id' => 'wagon_status_id_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagonHistories()
    {
        return $this->hasMany(WagonHistory::className(), ['wagon_wagon_id' => 'wagon_id']);
    }
}
