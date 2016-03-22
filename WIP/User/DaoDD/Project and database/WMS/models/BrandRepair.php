<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brand_repair".
 *
 * @property integer $brand_repair_id
 * @property string $name
 * @property integer $telephone
 * @property string $address
 *
 * @property DateRepair[] $dateRepairs
 */
class BrandRepair extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand_repair';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'telephone', 'address'], 'required'],
            [['telephone'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['address'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brand_repair_id' => 'Brand Repair ID',
            'name' => 'Name',
            'telephone' => 'Telephone',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDateRepairs()
    {
        return $this->hasMany(DateRepair::className(), ['brand_repair_brand_repair_id' => 'brand_repair_id']);
    }
}
