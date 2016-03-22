<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WagonStatus */

$this->title = 'Update Wagon Status: ' . ' ' . $model->status_id;
$this->params['breadcrumbs'][] = ['label' => 'Wagon Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->status_id, 'url' => ['view', 'id' => $model->status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wagon-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
