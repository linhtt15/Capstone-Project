<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kind_of_wagon".
 *
 * @property integer $kind_id
 * @property string $kind_name
 *
 * @property Wagon[] $wagons
 */
class KindOfWagon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kind_of_wagon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kind_name'], 'required'],
            [['kind_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kind_id' => 'Kind ID',
            'kind_name' => 'Loại toa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagons()
    {
        return $this->hasMany(Wagon::className(), ['kind_of_wagon_kind_id' => 'kind_id']);
    }
}
