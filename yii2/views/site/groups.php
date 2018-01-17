<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<br/>

<div class = "col-md-7">

<?php
foreach($groups as $var){?>
<h6><b>
<a href = "?group=<?=$var->id_groups?>">
<?=$var->group_name?>
</a>
</b>
</h6>
<hr/>
<?php } ?>

</div>
<div class = "col-md-2">
<li class="dropdown">
<a id = "addgroup" href="#" data-toggle="dropdown" class="dropdown-toggle">
      Additionally 
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li><a href = "/creategroup">Create group</a></li>
    </ul>
  </li>
</div>