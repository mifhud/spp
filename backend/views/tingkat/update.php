<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tingkat */

$this->title = 'Update Tingkat: ' . $model->id_tingkat;
$this->params['breadcrumbs'][] = ['label' => 'Tingkats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tingkat, 'url' => ['view', 'id' => $model->id_tingkat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tingkat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
