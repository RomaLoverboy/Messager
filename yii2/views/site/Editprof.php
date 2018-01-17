<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use yii\Helpers\Url;
?>

<?php $this->title = 'Edit'; 
$this->params['breadcrumbs'][] = $this->title;?>
<div class = "col-md-9">
<?php
	echo Nav::widget([
	'options' => ['class' => 'navbar-nav navbar-left'],
		 'items' => [
		 ['label' => 'Personal data', 'url' => ['/']],
	     ['label' => 'Contact information', 'url' => ['/']],
		 ]
	]);
?>
</div>