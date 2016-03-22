<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BrandRepair */

$this->title = 'Update Brand Repair: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brand Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->brand_repair_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brand-repair-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
