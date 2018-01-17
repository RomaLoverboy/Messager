<?php
use app\models\other\Notifications;
use app\models\other\Groups;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\other\Session_user;
use app\models\Forms\RegistrationForm;
?>
<br/>
<div class = "col-md-6">

<?php

foreach($show_notification as $var)
{
?>
<div class = "border">
<h6>
<b>
Пользователь: 
<p><a href = "?=id<?=$var->_from?>"><?php Session_user::identity($var->_from);?></a></p>
предлагает вступить в группу:
<p><?=Groups::_showGroup($var->params)?></p>
<?php 
$nameUser = new Notifications();
$nameUser->acept_and_reject($var->params, $var->id_not);
$nameUser->delete_notification_group($var->id_not);
?>
</b>
</h6>

<?php $form = ActiveForm::begin(['options'=> ['class' => 'form-horizontal']])?>
<?=Html::SubmitButton('Acept', ['Name' => 'Acept', 'class' => 'btn btn-success'])?>
<?=" "?>
<?=Html::SubmitButton('Reject', ['Name'=>'Reject', 'class'=>'btn btn-primary'])?>
<?php $form = ActiveForm::end()?> 
</div>
<?php
}
?>

</div>