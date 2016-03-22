<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchWagon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wagon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'wagon_id') ?>

    <?= $form->field($model, 'wagon_number') ?>

    <?= $form->field($model, 'created_year') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'wagon_status_id_status') ?>

    <?= $form->field($model, 'station_station_id') ?>

    <?= $form->field($model, 'kind_of_wagon_kind_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
