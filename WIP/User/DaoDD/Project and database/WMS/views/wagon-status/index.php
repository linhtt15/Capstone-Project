<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWagonStatus */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wagon Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wagon-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wagon Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'status_id',
            'name_of_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
