<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KindOfWagon */

$this->title = $model->kind_id;
$this->params['breadcrumbs'][] = ['label' => 'Kind Of Wagons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kind-of-wagon-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kind_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kind_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kind_id',
            'kind_name',
        ],
    ]) ?>

</div>
