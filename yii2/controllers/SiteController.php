<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\db\Command;
use yii\db\Query;
use app\models\forms\RegistrationForm;
use yii\web\UploadedFile;
use app\models\forms\FindForm;
use app\models\LoginForm;
use app\models\forms\MessageForm;
use app\models\forms\PostsForm;
use app\models\forms\PresonalForm;
use app\models\User;
use app\models\other\UploadImage;
use app\models\other\Profile;
use app\models\forms\Post;
use app\models\forms\CreateGroupForm;
use app\models\other\counts;
use app\models\other\Notifications;
use app\models\other\Groups;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
	{
	
		if(\Yii::$app->user->getId()){
        return $this->redirect('/myprofile'); 
}
	return $this->render('index');
	}
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegistration()
	{
	    $model = new RegistrationForm();
	    if(isset($_POST['RegistrationForm'])){
	    $model->attributes = Yii::$app->request->post('RegistrationForm');
	    if($model->validate() && $model->signup()){
        return $this->goHome();
	   }
		}
        return $this->render('Registration', ['model' => $model]);
    }

	public function actionMyprofile()
	{
		$model = new Profile();
		$id_user = \Yii::$app->user->getId();
		$model = $model->showProfile($id_user);
        return $this->render('myProfile', ['model' => $model]);		
	}
    public function actionProfile()
	{
        $frend = new RegistrationForm();
        $model = new Profile();
		$message = new MessageForm();
        $iam = \Yii::$app->user->getId();
		$request = \Yii::$app->request;
        $session = \Yii::$app->session;
		$id_user = $session->get('id');
		$my_id = \Yii::$app->user->getId();
		$model = $model->showProfile($id_user);
		$message->attributes = $request->post('MessageForm');
	    if($message->validate() && $message->sendConversation($id_user))
		{
		}
        if($request->get('group')){
          $notif = new Notifications();
		  $group = $request->get('group');
		  $notif->addToNotification($my_id, $id_user, $group);
        }
	    return $this->render('Profile', ['model'=> $model, 'message' => $message]);
		
	}	
	public function actionEditprofile()
	{
		return $this->render('Editprof');
	}
	
	public function actionIntereses()
	{
	    $model = new InteresesForm();	
	    
		if(isset($_POST['InteresesForm'])){
	    $model->attributes = Yii::$app->request->post('InteresesForm');
	    
		if($model->validate() && $model->updates()){
        return $this->goHome();
	  }
	}
		$change = \Yii::$app->request->post('InteresesForm');
		return $this->render('Intereses', ['model' => $model, 'change' => $change]);
		
    }
	
    public function actionMydialogs()
	{
	   $my_id = \Yii::$app->user->getId();
	   $request = \Yii::$app->request;
	   $model = new MessageForm();
	   $count = new counts();
       $dialogs = $model->showDialogs($my_id);
       if($request->get('id')){
		   $id = \Yii::$app->session;
		   $id['id'] = $request->get('id');
		   $count->readMessage($request->get('id'), $my_id);
		   return $this->redirect('/mymessages#form');
	   }
	   return $this->render('dialogs', ['dialogs' => $dialogs]);
	}
	
	public function actionMymessages()
    {
 	  $my_id = \Yii::$app->user->getId();
      $id_user = \Yii::$app->session;
      $id_user = $id_user['id'];
	  $request = \Yii::$app->request;
      $date = time() + 7200;
      $date_now = date('d F', $date);
      $model = new MessageForm();
	  $model->attributes = $request->post('MessageForm');
	  
	  if($model->validate() && $model->sendConversation($id_user))
		{
			
		}
	  if($request->get('id')){
		  $id_user = $request->get('id');
		  return $this->redirect('/profile');
	  }
	  $messages = $model->showMessages($id_user, $my_id);
	  return  $this->render('mymessages', ['messages' => $messages, 'model'=>$model, 'date_now' => $date_now]);
    }

	public function actionUpload(){
        $model = new UploadImage();
        $my_id = \Yii::$app->user->getId();
		if(\Yii::$app->request->isPost){
        $model->image = UploadedFile::getInstance($model, 'image');
        $model->upload();
		$model->updateAtatar($my_id);
        return $this->render('upload', ['model' => $model]);
}
        return $this->render('upload', ['model' => $model]);
}

	public function actionFind(){
	$model = new FindForm();
	$request = \Yii::$app->request;
    $find = $request->post('FindForm');
	if($find == null){
		$find = '1231241werfscvcx24125326236fdsf41123';
	}
	$Find = $model->showFind($find);
	
	if($_GET['id'] !== null){
	$id_user = \Yii::$app->session;
	$id_user['id'] = $request->get('id');
	return $this->redirect("/profile");
	}
    return $this->render('find', ['Find' => $Find, 'model'=>$model]);
}

    public function actionNotification()
    {
     $request = Yii::$app->request;
     $session = Yii::$app->session;
	 $my_id = \Yii::$app->user->getId();
     $Notification = new Notifications();
	 
     if($session['group'] !==null && $session['id'] !== null){
     $group = $Notification->Group($session['group'], $session['id']);
     }
	 $show_notification = $Notification->show_notification($my_id);
	 
     return $this->render('Notification', ['group' => $group, 'nameUser' => $nameUser, 'show_notification' => $show_notification]);
    }
	
    public function actionGroups()
    {  
       $model = new Groups();
       $session = \Yii::$app->session;
	   $request = \Yii::$app->request;
       $my_id = \Yii::$app->user->getId();
	   if($request->get('group'))
       {
        $session['group'] = $request->get('group');
        return $this->redirect('/mygroup');
       }
	   $groups = $model->showMyGroups($my_id);
       return $this->render('groups', ['groups' => $groups]);
    }
    public function actionMygroup()
	{
       $model = new PostsForm();
       $group = new Groups();
	   $request = \Yii::$app->request;
	   $session = \Yii::$app->session;
       $my_id = \Yii::$app->user->getId();
       $id_group = $session->get('group');
       if($request->post('exit')!== null){
	   $group->exitGroup($id_group, $my_id);
	   return $this->redirect('/groups');
	}
	   $model->attributes = $request->post('PostsForm');
       if($model->validate() && $model->signup($id_group))
       {
      
       }
       $group = $group->showGroup($id_group);
	   $showPost = $model->showPosts($id_group);
    return $this->render('mygroup',['model' => $model, 'showPost' => $showPost, 'group' => $group, 'id_group' => $id_group]);
    }
	   
	public function actionCreategroup(){
      $request = Yii::$app->request;
      $autor = Yii::$app->user->getId();
      $model = new CreateGroupForm();
      $group = mt_rand(000000000, 999999999);
      $model->attributes = $request->post('CreateGroupForm');
      if($model->validate() && $model->createGroupAndaddToGroup($autor, $group))
      {
          return $this->redirect('/groups');
      }
      return $this->render('creategroup', ['model'=>$model]);
    }
}
