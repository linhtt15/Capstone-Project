<?php

namespace app\controllers;

use app\models\User;
use yii;

class DangnhapController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new User();

                    if($model->load(Yii::$app->request->post())) {
                $request = Yii::$app->request->post('User');
                $username = $request['username'];
                $password = $request['password'];

            if($model->Dangnhap($username,$password)==true){
                echo 'Đăng nhập thành công';
                Yii::$app->session->setFlash('LoginSuccess');
            }else{
                Yii::$app->session->setFlash('LoginFalse');

            }
        }
        return $this->render('index',['model' => $model]);
    }

}
