<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KindOfWagon */

$this->title = 'Create Kind Of Wagon';
$this->params['breadcrumbs'][] = ['label' => 'Kind Of Wagons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kind-of-wagon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
