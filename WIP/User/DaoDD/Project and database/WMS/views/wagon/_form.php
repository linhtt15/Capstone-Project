<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\WagonStatus;
use yii\helpers\ArrayHelper;
use app\models\Station;
use app\models\KindOfWagon;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Wagon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wagon-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-2\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 left-align'],
        ],
    ]); ?>

    <?= $form->field($model, 'wagon_number')->textInput() ?>

    <?= $form->field($model, 'created_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->widget(
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

    <?= $form->field($model, 'wagon_status_id_status')->dropDownList(
    ArrayHelper::map(WagonStatus::find()->all(),'status_id','name_of_status'),
        ['prompt'=>'Trạng thái toa...']
    ) ?>



    <?= $form->field($model, 'station_station_id')->dropDownList(
    ArrayHelper::map(Station::find()->all(),'station_id','station_name'),
    ['prompt'=>'Chọn ga...']
    ) ?>
    <?= $form->field($model, 'kind_of_wagon_kind_id')->dropDownList(
        ArrayHelper::map(KindOfWagon::find()->all(),'kind_id','kind_name'),
        ['prompt'=>'Chọn loại toa...']
    ) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
