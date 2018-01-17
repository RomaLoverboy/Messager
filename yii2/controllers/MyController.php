<?php
namespace app\controllers;
use Yii;
use yii\console\Controller;
use app\rbac\AuthorRule;
use app\models\GeneralInformation;
use app\models\RegistrationForm;
use yii\web\Request;
use app\models\PostsForm;
use yii\helpers\Html;
use app\models\Posts;
class MyController extends \yii\web\Controller{
	
public function actionButton($id = null){
$General_information = General_information::find()
->where(['Name' => 'Антон'])
->all();
$Find = General_information::findOne('cekalo@mail.ru');
return $this->render('Authorization', ['model' => $General_information, 'Find' => $Find]);
}
	
public function actionRegistration(){

	$model = new RegistrationForm();
	if(isset($_POST['RegistrationForm'])){
	$model->attributes = Yii::$app->request->post('RegistrationForm');
	if($model->validate() && $model->signup()){
        return $this->goHome();
	}
		}
return $this->render('Registration', ['model' => $model]);
}

public function actionPost(){
	$model = new PostsForm();
	if(isset($_POST['PostsForm'])){
	$model->attributes = Yii::$app->request->post('PostsForm');
	if($model->validate() && $model->signup()){
		return $this->goHome();
	}
	}
return $this->render('Posts', ['model' => $model]);
}

public function actionProfile(){
	$model = GeneralInformation::find()
	->where(['id_user' => \Yii::$app->user->getId()
	])
	->all();
	return $this->render('Profile', ['model'=> $model]);
	}	
public function actionMyposts()
 {
	$id = \Yii::$app->user->getId();
	$model = Posts::find()
	->where(['Reference' => $id])
	->all();
	return $this->render('Myposts', ['model'=>$model]);
 }
}
?>