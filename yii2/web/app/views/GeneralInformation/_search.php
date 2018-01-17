<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GeneralInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="general-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Surname') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'Sex') ?>

    <?php // echo $form->field($model, 'DOB') ?>

    <?php // echo $form->field($model, 'Password') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
