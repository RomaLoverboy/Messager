<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<br/>

<div class = "col-md-9">
<div class = "col-md-12">
<div class = "col-md-5">
<?php
foreach($model as $var){?>
<h6><b><?=$var->Name?>

<?=$var->Surname?></b></h6>

<img src = "<?=$var->avatar ?>" class = "img-responsive"/>
<br/>
<p><a href = "/upload">Изменить изображение</a></p>
</div>
<?php } ?>
</div>
</div>
</div>
</div>