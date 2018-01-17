<?php
use yii\Helpers\Html;

if(!\Yii::$app->user->identity->Surname)
{
	$this->title = 'My site';
}

else $this->title = \Yii::$app->user->identity->Surname;
?>
