<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WagonStatus */

$this->title = 'Create Wagon Status';
$this->params['breadcrumbs'][] = ['label' => 'Wagon Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wagon-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
