<?php
use yii\widgets\activeform;
use yii\helpers\html;
?>
<?php if(Yii::$app->session->hasFlash('LoginFalse')){
?>
<div class="alert alert-danger">Đăng nhập thất bại!</div>
<?php } ?>

<?php if(Yii::$app->session->hasFlash('LoginSuccess')){
    ?>
    <div class="alert alert-success">Đăng nhập thành công!</div>
<?php } ?>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username')->textInput(['placeholder'=>'Nhập tên tài khoản'])?>
<?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Nhập mật khẩu'])?>
<?= html::submitButton('Đăng nhập',['class'=>'btn btn-primary']) ?>
<?php $form = ActiveForm::end() ?>
