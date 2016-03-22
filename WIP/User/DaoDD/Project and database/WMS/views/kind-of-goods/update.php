<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KindOfGoods */

$this->title = 'Update Kind Of Goods: ' . ' ' . $model->kind_of_goods_id;
$this->params['breadcrumbs'][] = ['label' => 'Kind Of Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kind_of_goods_id, 'url' => ['view', 'id' => $model->kind_of_goods_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kind-of-goods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
