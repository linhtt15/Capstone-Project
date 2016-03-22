<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBrandRepair */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brand Repairs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-repair-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Brand Repair', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'brand_repair_id',
            'name',
            'telephone',
            'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
