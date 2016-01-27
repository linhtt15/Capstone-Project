<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\SearchUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchUser();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id_user
     * @param string $username
     * @param string $email
     * @return mixed
     */
    public function actionView($id_user, $username, $email)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user, $username, $email),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'username' => $model->username, 'email' => $model->email]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_user
     * @param string $username
     * @param string $email
     * @return mixed
     */
    public function actionUpdate($id_user, $username, $email)
    {
        $model = $this->findModel($id_user, $username, $email);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'username' => $model->username, 'email' => $model->email]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_user
     * @param string $username
     * @param string $email
     * @return mixed
     */
    public function actionDelete($id_user, $username, $email)
    {
        $this->findModel($id_user, $username, $email)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param string $username
     * @param string $email
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $username, $email)
    {
        if (($model = User::findOne(['id_user' => $id_user, 'username' => $username, 'email' => $email])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
