<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GeneralInformation */

$this->title = 'Update General Information: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'General Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="general-information-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
