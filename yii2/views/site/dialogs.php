<?php
use app\models\other\counts;
use app\models\other\Session_user;
?>
<br/>
<br/>
<div class = "col-md-8">
<?php
foreach($dialogs as $var)
{
?>


<a href = "?id=<?php if(\Yii::$app->user->getId() !== $var->user_1)
{
	echo $var->user_1;
}elseif(\Yii::$app->user->getId() !== user_2){
	echo $var->user_2;
}
?>">
<?php 
$user = new Session_user();
if(\Yii::$app->user->getId() !== $var->user_1)
{
	$user->identity($var->user_1);
}elseif(\Yii::$app->user->getId() !== user_2){
	$user->identity($var->user_2);
}
?>

<?php 
$count = new counts();
if(\Yii::$app->user->getId() !== $var->user_1)
{
	$count = $count->counts($var->user_1, \Yii::$app->user->getId());
}elseif(\Yii::$app->user->getId() !== user_2){
	$count = $count->counts($var->user_2, \Yii::$app->user->getId());
}
?>
</a>
<?php if($count == 0){
echo " ";
}else echo "<span class = 'badge badge-pill badge-default'>" . $count . "</span>";
?>

<hr/>

<?php 
}
?>
</div>

