<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\BrandRepair;
use app\models\Wagon;


/* @var $this yii\web\View */
/* @var $model app\models\DateRepair */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="date-repair-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'begin_day')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>


    <?= $form->field($model, 'repair_day')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>


    <?= $form->field($model, 'repair_complete_day')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'wagon_wagon_id')->dropDownList(
        ArrayHelper::map(Wagon::find()->all(),'wagon_id','wagon_number'),
        ['prompt'=>'Số hiệu toa...']
    ) ?>

    <?= $form->field($model, 'brand_repair_brand_repair_id')->dropDownList(
        ArrayHelper::map(BrandRepair::find()->all(),'brand_repair_id','name'),
        ['prompt'=>'Hãng sửa chữa...']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
