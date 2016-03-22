<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use app\models\WagonStatus;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Wagon */

$this->title = $model->wagon_id;
$this->params['breadcrumbs'][] = ['label' => 'Wagons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wagon-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->wagon_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->wagon_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        //'filterModel' => $searchModel,
        'attributes' => [
            'wagon_id',
            'wagon_number',
            'created_year',
            'start_date',
            'wagon_status_id_status',

            'station_station_id',
            'kind_of_wagon_kind_id',
        ],
    ]) ?>

</div>
