<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchKindOfWagon */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kind Of Wagons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kind-of-wagon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm toa xe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kind_id',
            'kind_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
