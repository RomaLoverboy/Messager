<?php
use app\models\other\Profile;
use yii\widgets\Menu;
use yii\web\Request;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\models\other\Notification;
use app\models\other\Session_user;
use app\models\other\Groups;
use app\models\other\counts;
?>

<br/>

<div class = "col-md-9">

<div class = "col-md-12">
<?php foreach($group as $var){?>
<img class="img-responsive" src ="<?=$var->image?>"></img>
<?php $form = ActiveForm::begin(['options'=>['align' => 'right']])?>
<?=Html::SubmitButton('End to group',['Name'=> 'exit', 'class'=>'btn btn-link'])?>
<?php $form = ActiveForm::end()?>
</div>

<div class = "col-md-12">

<div class = "col-md-8">
<b><h3><?=$var->group_name?></h3></b>
<i><h6><?=$var->theme_group?></h6></i>
<?php }?>
</div>

<div class = "col-md-4">
<div class = "mygroup-right-users">
<a data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal" id = "a-count" href = "#">Users: <?=counts::counts_users_to_group()?></a>
<br/>
<h6><p><?=Groups::allUsersToGroup($id_group)?></p></h6>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?=Groups::showAllUsers($id_group)?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<div class = "col-md-12">
<div class = "col-md-9">
<?php Pjax::begin(['enablePushState' => false, 'timeout' => 5000])?>
<?php 
foreach($showPost as $var)
{
?>
<p><?=Session_user::identity($var->autor)?></p>
<?=$var->Title?>
<br/>
<?=$var->Texte?>
<hr/> 
<?php
}
?>
<?php
$form = ActiveForm::begin([
'options' => ['class' => '', 'data-pjax' => true, 'enctype' => 'multipart/form-data'], 
])?>
<?= $form->field($model, 'Title')->textInput()->label('Title')?>
<?= $form->field($model, 'Texte')->textarea(['rows' => 2, 'cols'=> 20])->label('Text')?>
<?=Html::submitButton('Send', ['Name' => 'Post', 'class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
<?php Pjax::end();?>
</div>
<div class = "col-md-3">

</div>
</div>

<div class = "col-md-12">

<div class = "col-md-9">

</div>

<div class = "col-md-3">
<h5>Autor:</h5>
<p><?=Session_user::identity($var->autor)?></p>
</div>
</div>
</div>



