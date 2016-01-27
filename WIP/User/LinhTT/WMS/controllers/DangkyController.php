<?php

namespace app\controllers;

use app\models\User;
use yii;

class DangkyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new User();

        if($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('User');
            $username = $request['username'];
            $password = $request['password'];
            $email = $request['email'];
            if($model->Dangky($username,$password,$email)==true){
                Yii::$app->session->setFlash('SignupSuccess');
            }else{
                Yii::$app->session->setFlash('SignupFalse');

            }

        }
            return $this->render('index', ['model' => $model]);

    }

}
