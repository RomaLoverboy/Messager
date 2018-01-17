<?php
use yii\widgets\Menu;
use yii\web\Request;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>
<?php
$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(['enablePushState' => false, 'timeout' => 5000])?>
<div class = "col-md-8">
<?php foreach ($show as $var)
{
?>
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
</div>
<?php ActiveForm::end() ?>
<?php Pjax::end();?>