<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchKindOfGoods */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kind Of Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kind-of-goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm loại hàng', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'kind_of_goods_id',
            'kind_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
