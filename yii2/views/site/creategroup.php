<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<br/>
<div class = "col-md-8">
<?php $form = ActiveForm::begin()?>
<?=$form->field($model, 'group_name')->textInput()?>
<?=$form->field($model, 'theme_group')->dropDownList(['Policy' => 'Policy', 'Society' => 'Society', 'Animals' => 'Animals', 'Science and Technology' => 'Science and Technology', 'News' => 'News'])?>
<?=Html::SubmitButton('Create', ['class' => 'btn btn-primary'])?>
<?php $form = ActiveForm::end()?>
</div>