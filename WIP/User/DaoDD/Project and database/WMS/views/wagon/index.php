<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\WagonStatus;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Station;
use app\models\KindOfWagon;
use dosamigos\datepicker\Datepicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWagon */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wagons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wagon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Thêm toa', ['value'=>Url::to('wagon/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
                'header'=>'<h4>THÊM TOA XE</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'wagon_id',
            'wagon_number',
            'created_year',
//            [
//                'atribute' => 'start_date',
//                'value' => 'start_date'
//                'format'=>'raw',
//                'filter'
//            ]
            //'start_date',
            [
                'attribute'=>'start_date',
                'value'=>'start_date',
               // 'format'=>'raw',
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'start_date',
                    //'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
            ],
            [
                'attribute'=>'wagon_status_id_status',
                'value'=>'wagonStatusIdStatus.name_of_status',
                'filter'=> Html::activeDropDownList($searchModel,'wagon_status_id_status', ArrayHelper::map(WagonStatus::find()->all(),'status_id','name_of_status'),['class'=>'form-control','prompt'=>'Please select...']),
            ],
            ['attribute'=>'station_station_id',
                'value'=>'stationStation.station_name',
                'filter'=> Html::activeDropDownList($searchModel,'station_station_id', ArrayHelper::map(\app\models\Station::find()->all(),'station_id','station_name'),['class'=>'form-control','prompt'=>'Please select...']),
            ],
            ['attribute'=>'kind_of_wagon_kind_id',
                'value'=>'kindOfWagonKind.kind_name',
                'filter'=> Html::activeDropDownList($searchModel,'kind_of_wagon_kind_id', ArrayHelper::map(\app\models\KindOfWagon::find()->all(),'kind_id','kind_name'),['class'=>'form-control','prompt'=>'Please select...']),
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
