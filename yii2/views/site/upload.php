<?php
use yii\widgets\ActiveForm;
?>
<br/>
<div class = "col-md-6">
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'image')->fileInput() ?>
<button>Загрузить</button>
<?php ActiveForm::end() ?>
</div>





