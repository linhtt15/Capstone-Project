<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BrandRepair */

$this->title = 'Create Brand Repair';
$this->params['breadcrumbs'][] = ['label' => 'Brand Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-repair-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
