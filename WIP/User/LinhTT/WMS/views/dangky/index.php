<?php
use yii\widgets\activeform;
use yii\helpers\html;
?>
<?php if(Yii::$app->session->hasFlash('SignupFalse')){
    ?>
    <div class="alert alert-danger">Đăng ký thất bại!</div>
<?php } ?>

<?php if(Yii::$app->session->hasFlash('SignupSuccess')){
    ?>
    <div class="alert alert-success">Đăng ký thành công!</div>
<?php } ?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username')->textInput(['placeholder'=>'Nhập tên tài khoản'])?>
<?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Nhập mật khẩu'])?>
<?= $form->field($model, 'email')->textInput(['placeholder'=>'Nhập email đăng ký'])?>
<?= html::submitButton('Đăng ký',['class'=>'btn btn-primary']) ?>
<?php $form = ActiveForm::end() ?>
