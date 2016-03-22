<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchDateRepair */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="date-repair-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_date_repair') ?>

    <?= $form->field($model, 'begin_day') ?>

    <?= $form->field($model, 'repair_day') ?>

    <?= $form->field($model, 'repair_complete_day') ?>

    <?= $form->field($model, 'wagon_wagon_id') ?>

    <?php // echo $form->field($model, 'brand_repair_brand_repair_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
