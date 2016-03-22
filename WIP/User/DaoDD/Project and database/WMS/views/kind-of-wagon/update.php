<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KindOfWagon */

$this->title = 'Update Kind Of Wagon: ' . ' ' . $model->kind_id;
$this->params['breadcrumbs'][] = ['label' => 'Kind Of Wagons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kind_id, 'url' => ['view', 'id' => $model->kind_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kind-of-wagon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
