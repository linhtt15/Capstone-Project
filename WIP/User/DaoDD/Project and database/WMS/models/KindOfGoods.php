<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kind_of_goods".
 *
 * @property integer $kind_of_goods_id
 * @property string $kind_name
 *
 * @property Contract[] $contracts
 * @property ShippingCost[] $shippingCosts
 */
class KindOfGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kind_of_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kind_name'], 'required'],
            [['kind_name'], 'string', 'max' => 45],
            [['kind_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kind_of_goods_id' => 'Kind Of Goods ID',
            'kind_name' => 'Loại Hàng',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['kind_of_goods_kind_of_goods_id' => 'kind_of_goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingCosts()
    {
        return $this->hasMany(ShippingCost::className(), ['kind_of_goods_kind_of_goods_id' => 'kind_of_goods_id']);
    }
}
