<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\findForm;
use app\models\other\Session_user;
?>
<br/>
<div class = "col-md-5">
<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'Find')->textInput()?>
<?=Html::submitButton('Find', ['Name'=>'find', 'class'=> 'btn btn-primary'])?>

<?php ActiveForm::end();?>
<br/>
<?php if($Find !== null){
foreach($Find as $var){?>

<a href = "?id=<?=$var->id_user?>">
<?=Session_user::identity($var->id_user)?>
</a>

<?php }
}
?>
</div>