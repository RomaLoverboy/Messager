<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GeneralInformation */

$this->title = 'Create General Information';
$this->params['breadcrumbs'][] = ['label' => 'General Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
