<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "date_repair".
 *
 * @property integer $id_date_repair
 * @property string $begin_day
 * @property string $repair_day
 * @property string $repair_complete_day
 * @property integer $wagon_wagon_id
 * @property integer $brand_repair_brand_repair_id
 *
 * @property BrandRepair $brandRepairBrandRepair
 * @property Wagon $wagonWagon
 */
class DateRepair extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'date_repair';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['begin_day', 'repair_day', 'repair_complete_day', 'wagon_wagon_id', 'brand_repair_brand_repair_id'], 'required'],
            [['begin_day', 'repair_day', 'repair_complete_day'], 'safe'],
            [['wagon_wagon_id', 'brand_repair_brand_repair_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_date_repair' => 'Id Date Repair',
            'begin_day' => 'Begin Day',
            'repair_day' => 'Repair Day',
            'repair_complete_day' => 'Repair Complete Day',
            'wagon_wagon_id' => 'Wagon Wagon ID',
            'brand_repair_brand_repair_id' => 'Brand Repair Brand Repair ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrandRepairBrandRepair()
    {
        return $this->hasOne(BrandRepair::className(), ['brand_repair_id' => 'brand_repair_brand_repair_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagonWagon()
    {
        return $this->hasOne(Wagon::className(), ['wagon_id' => 'wagon_wagon_id']);
    }
}
