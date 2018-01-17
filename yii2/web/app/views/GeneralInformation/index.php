<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GeneralInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'General Informations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-information-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create General Information', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_user',
            'Name',
            'Surname',
            'Email:email',
            'Sex',
            // 'DOB',
            // 'Password',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
