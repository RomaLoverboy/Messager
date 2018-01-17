<?php
use app\models\other\Session_user;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\findForm;
use yii\widgets\Pjax;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<br/>
<br/>
<div class = "pjax-container">
<?php Pjax::begin(['enablePushState' => false, 'timeout' => 5000]);?>
<div class = "col-md-8">
<?php
foreach($messages as $var){
if(date('d F', $var->datetime+7200) == $date_now){?>
<div id = "date"><h6><b>Сегодня</b></h6></div>
<?php }
else{?>
<div id = "date"><h6><b><?=date('d F', $var->datetime+7200)?></b></h6></div>
<?php }?>
<a id = "ko" href = "?id=<?=$var->_from?>">

<script>

</script>

<?php
$session = \Yii::$app->session;
	if($session['id'] == $var->_from){
		$Mv = new Session_user();
		$Mv->identity($session['id']);
	}
	elseif($var->_from == \Yii::$app->user->getId()){?>
		<img src = "<?=\Yii::$app->user->identity->avatar?>" class="img-circle" height = "40" width = "40"/>
		<?=\Yii::$app->user->identity->Name?>
		<?=" "?>
		<?=\Yii::$app->user->identity->Surname?>
	    
<?php	
	}
	?>
</a> 
	<?php if($var->_from == \Yii::$app->user->getId()){?>
	
    <span id = "time"><?=$time = date('H:i', $var->datetime+7200)?></span>
    
    <p class = "my-message">
    <?=$var->_reply?>
    </p>
	<?php }else {?>
    
	<span id = "time"><?=$time = date('H:i', $var->datetime+7200)?></span>
    <br/>
    <p class = "user-message">
    <?=$var->_reply?>
	</p>
    <?php }?>
	<?php if($var->status == 1){?>
		<div id = "tim" title = "Данное сообщение не прочитано"><h4 id ="status">*</h4></div></a>
		<style>
        #status{
			background-color: #F5F4FF;
		}
        </style>
	<?php }?>
	<hr/>
<?php }
?>

<?php
$form = ActiveForm::begin([
'options' => ['class' => 'fixed', 'data-pjax' => true, 'enctype' => 'multipart/form-data', 'id' => 'form'], 
]);?>
<?=$form->field($model, 'Text')->textarea(['rows' => 1, 'cols'=> 20, 'maxlength' => 14500, 'placeholder' => 'Введите ваше сообщение', 'wrap' => 'hard'])?>
<?=Html::submitButton('Send', ['Name' => 'Post', 'class' => 'btn btn-success']) ?>

</div>

<?php ActiveForm::end();?>
<?php Pjax::end();?>
</div>
<div class = "col-md-3">
<div class="btn-group dropup">
<ul class="nav nav-pills">
  <li class="dropdown">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
      Мenu 
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li><a href="/myprofile">My profile</a></li>
      <li><a href="/post">My posts</a></li>
      <li><a href="/editprofile">Edit my profile</a></li>
      <li><a href="/mydialogs">My messages</a></li>
      <li><a href="/find">Find</a></li>
      <li><a href="/notification">Notification</a></li> 
      <li><a href="/logout">Logout</a></li>
    </ul>
  </li>
</ul>
</div>
<a class = "go-up" href = "#">Q</a>
<a class = "go-down" href = "#">W</a>
</div>