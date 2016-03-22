<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wagon */

$this->title = 'Cập nhật toa xe: ' . ' ' . $model->wagon_id;
$this->params['breadcrumbs'][] = ['label' => 'Wagons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wagon_id, 'url' => ['view', 'id' => $model->wagon_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wagon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
