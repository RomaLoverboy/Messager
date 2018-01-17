<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\Helpers\Url;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <?= Html::csrfMetaTags() ?>
    
	<title><?= Html::encode($this->title) ?></title>
	    <?php $this->head() ?>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/up_down.js"></script>
<?php $this->beginBody() ?>
<div class = "fixed-top">
<div class = "line">
<div class = "container">
<?php
if(\Yii::$app->user->getId()){?>
<h1 class = "badge badge-default">Online</h1>
<?php }else{ ?>
<h1 class = "badge badge-default">Ofline</h1>
<?php }?>
</div>
</div>
</div>
<div class = "container">
<div class="wrap">
<div class = "row">
<div class = "col-md-2">
    

<?php
 	if(\Yii::$app->user->isGuest)
	{
		echo Nav::widget([
		'options' => ['class' => 'navbar navbar-toggleable-md navbar-light bg-faded'],
		 'items' => [
		 ['label' => 'Registration', 'url' => ['/registration'], 'class' => 'btn btn-primary'],
		 ['label' => 'Login', 'url' => ['/login']]
		 ],
		]);
	}
	else
	{?>
   
    <br/>
	<nav class = "fixed">
    <?=Html::a('My profile', '/myprofile')?>
	<br/>
	<?=Html::a('Edit my profile', '/editprofile')?>
	<br/>
	<?=Html::a('My messages', '/mydialogs')?>
	<br/>
	<?=Html::a('Find', '/find')?>
    <br/>
    <?=Html::a('Groups', '/groups')?>
    <br/>
    <?=Html::a('Notification', '/notification')?>	
    <br/>
	<?=Html::a('Logout', '/logout')?>
	<?php
	}?>
	</nav>
	
</div>
<?php
/* if(Yii::$app->user->can('editor', ['post' => $model->id_user])){
			echo Html::a(['/profile'], 'post')
		    . Html::submitButton('My profile', ['Name' => 'Update'])
            . Html::endForm();	
} */
?>
<div class = "col-md-9">
		<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
</div>
        <?= $content ?>
	
</div>
</div>
<div class="go-up" id='ToTop'>⇧</div>
<div class="go-down" id='OnBottom'>⇩</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
