<?php

namespace app\controllers;

use Yii;
use app\auth\models\AuthItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacController extends Controller
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
    //user assignment
    public function actionAssignment(){
        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');

        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }

    //create roles
    public function actionCreate_role(){
        //author -> index/create/view
        //admin ->(author) and update/delete -> index/create/view/update/delete
        // add "author" role and give this role the "createPost" permission
        $auth = Yii::$app->authManager;

        $ListUser = $auth->createPermission('user/index');
        $createUser = $auth->createPermission('user/create');
        $viewUser = $auth->createPermission('user/view');

        $updateUser = $auth->createPermission('user/update');
        $deleteUser = $auth->createPermission('user/delete');

        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $ListUser);
        $auth->addChild($author, $createUser);
        $auth->addChild($author, $viewUser);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $updateUser);
        $auth->addChild($admin, $deleteUser);

    }
//Create Permission
    public function actionCreate_permission(){
        $auth = Yii::$app->authManager;

        // add "ListUser" permission
        $ListUser = $auth->createPermission('user/index');
        $ListUser->description = 'List User';
        $auth->add($ListUser);

        // add "Create User" permission
        $createUser = $auth->createPermission('user/create');
        $createUser->description = 'Create User';
        $auth->add($createUser);

        // add "viewUser" permission
        $viewUser = $auth->createPermission('user/view');
        $viewUser->description = 'view User';
        $auth->add($viewUser);

        // add "updateUser" permission
        $updateUser = $auth->createPermission('user/update');
        $updateUser->description = 'Update User';
        $auth->add($updateUser);

        // add "deleteUser" permission
        $deleteUser = $auth->createPermission('user/delete');
        $deleteUser->description = 'delete User';
        $auth->add($deleteUser);
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
