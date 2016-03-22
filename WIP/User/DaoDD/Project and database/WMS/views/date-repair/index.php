<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Wagon;
use dosamigos\datepicker\Datepicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchDateRepair */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $data app\models\DateRepair*/

$this->title = 'Date Repairs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-repair-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Date Repair', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_date_repair',
            //'begin_day',
            [
                'attribute'=>'begin_day',
                'value'=>'begin_day',
                // 'format'=>'raw',
                'contentOptions'=>[
                    'style'=>'width:10%',
                ],
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'begin_day',
                    //'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
            ],
            //'repair_day',
            [
                'attribute'=>'repair_day',
                'contentOptions'=>[
                    'style'=>'width:10%',
                ],
                'value'=> function($data) {
                    $date = date("d-m-Y", strtotime($data["repair_day"]));
                    $date2 = new DateTime($date);
                    $date2->add(new DateInterval('P20M'));
                    return $date2->format("Y-m-d");
                },
                // 'format'=>'raw',
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'repair_day',
                    //'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
            ],
//            'repair_complete_day',
            [
                'attribute'=>'repair_complete_day',
                'contentOptions'=>[
                    'style'=>'width:10%',
                ],
                'value'=> function($data) {
                    $date = date("d-m-Y", strtotime($data["repair_day"]));
                    $date2 = new DateTime($date);
                    $date2->add(new DateInterval('P20M'));
                    $date2 = $date2->add(new DateInterval('P10D'));
                    return $date2->format("Y-m-d");
                },
                // 'format'=>'raw',
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'repair_complete_day',
                    //'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
            ],
            //'wagon_wagon_id',
            [
                'attribute'=>'wagon_wagon_id',
                'value'=>'wagonWagon.wagon_number',
                'filter'=> Html::activeDropDownList($searchModel,'wagon_wagon_id', ArrayHelper::map(Wagon::find()->all(),'wagon_id','wagon_number'),['class'=>'form-control','prompt'=>'Please select...']),
            ],
            // 'brand_repair_brand_repair_id',
            [
                'attribute'=>'brand_repair_brand_repair_id',
                'value'=>'brandRepairBrandRepair.name',
                'filter'=> Html::activeDropDownList($searchModel,'brand_repair_brand_repair_id', ArrayHelper::map(\app\models\BrandRepair::find()->all(),'brand_repair_id','name'),['class'=>'form-control','prompt'=>'Please select...']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
