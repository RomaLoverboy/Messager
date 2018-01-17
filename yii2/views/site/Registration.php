<?php

use yii\widgets\Menu;
use yii\web\Request;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\assets\AppAsset;
?>
<?php
$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "col-md-8">
<?php
$form = ActiveForm::begin([
'id' => 'login-form',
'options' => ['class' => 'horizontal'], 
])?>

<?= $form -> field($model, 'Name')->textInput()->label('Name')?>
<?= $form -> field($model, 'Surname')->textInput()->label('Surname')?>
<?= $form -> field($model, 'username')->textInput()->label('Login')?>
<?= $form -> field($model, 'Password')->passwordInput()?>

<div class = 'form-group'> 
<div class = 'col-lg-offset-1 col-lg-11'>
<?=Html::submitButton('Registration', ['Name' => 'Registration']) ?>
</div>

</div>
<?php ActiveForm::end() ?>
</div>