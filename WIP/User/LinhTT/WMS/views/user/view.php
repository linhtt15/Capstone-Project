<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id_user;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_user' => $model->id_user, 'username' => $model->username, 'email' => $model->email], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_user' => $model->id_user, 'username' => $model->username, 'email' => $model->email], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_user',
            'firstname',
            'lastname',
            'username',
            'password',
            'email:email',
        ],
    ]) ?>

</div>