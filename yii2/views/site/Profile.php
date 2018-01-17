<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\other\Groups;
?>

<br/>
<div class = "col-md-8">
<div class = "col-md-12">
<div class = "col-md-5">
<?php
foreach($model as $var){?>
<h6><b><?=$var->Name?>

<?=$var->Surname?></b></h6>
<img src = "<?=$var->avatar ?>" class = "img-responsive"/>
<br/>

<input data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal" type = "submit" id = "Send" class = "btn btn-primary" value = "Send message"/>
<p>
<li class="dropdown">
<a id = "addgroup" href="#" data-toggle="dropdown" class="dropdown-toggle">
      Add to group 
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <?=Groups::showGroupsAddToGroup(\Yii::$app->user->getId())?>
    </ul>
  </li>
<?php }?>

</div>
</div>
</div>
</div>

<div id="exampleModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Send message</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
	  <?php $form = ActiveForm::begin()?>
      <?=$form->field($message, 'Text')->textarea(['rows'=>5, 'cols'=>74, 'maxlength' => 14500, 'placeholder' => 'Введите ваше сообщение', 'wrap' => 'hard'])?>	
      <?=Html::submitButton('Send message', ['class'=>'btn btn-success'])?>
	  <?php $form = ActiveForm::end();?>
	  </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>