<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DateRepair */

$this->title = 'Create Date Repair';
$this->params['breadcrumbs'][] = ['label' => 'Date Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-repair-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
