<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wagon_status".
 *
 * @property integer $status_id
 * @property string $name_of_status
 *
 * @property Wagon[] $wagons
 * @property WagonHistory[] $wagonHistories
 */
class WagonStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wagon_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_of_status'], 'required'],
            [['name_of_status'], 'string', 'max' => 45],
            [['name_of_status'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'name_of_status' => 'Trạng thái toa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagons()
    {
        return $this->hasMany(Wagon::className(), ['wagon_status_id_status' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagonHistories()
    {
        return $this->hasMany(WagonHistory::className(), ['wagon_status_status_id' => 'status_id']);
    }
}
