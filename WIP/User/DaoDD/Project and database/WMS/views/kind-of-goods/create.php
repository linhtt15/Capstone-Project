<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KindOfGoods */

$this->title = 'Thêm loại hàng';
$this->params['breadcrumbs'][] = ['label' => 'Kind Of Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kind-of-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
