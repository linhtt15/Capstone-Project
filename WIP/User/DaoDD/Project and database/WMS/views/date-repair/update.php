<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DateRepair */

$this->title = 'Update Date Repair: ' . ' ' . $model->id_date_repair;
$this->params['breadcrumbs'][] = ['label' => 'Date Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_date_repair, 'url' => ['view', 'id' => $model->id_date_repair]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="date-repair-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
