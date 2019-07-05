<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Siswa;

/* @var $this yii\web\View */
/* @var $model backend\models\Pembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'siswa_nis')->dropDownList(
        ArrayHelper::map(Siswa::find()->all(), 'nis', 'nama'),
        ['prompt' => 'Pilih Siswa']
    ) ?>

    <?= $form->field($model, 'nominal')->textInput() ?>

    <?= $form->field($model, 'tanggal_bayar')->textInput() ?>

    <?= $form->field($model, 'bulan')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
