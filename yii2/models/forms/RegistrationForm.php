<?php
namespace app\models\forms;
use Yii;
use yii\db\Command;
use yii\db\ActiveForm;
use yii\base\Model;
use yii\db\ActionRecord;
use app\models\tables\GeneralInformation;
use app\models\tables\Frends;
use app\models\tables\Group;
use app\models\tables\usesandgroups;
class RegistrationForm extends GeneralInformation
{
	public $Name;
	public $Surname;
	public $username;
public function rules() {
	
	return [
	[['Name', 'Surname', 'username', 'Password'], 'required'],
	['Password', 'string', 'min' => 4, 'max' => 10],
	['username', 'unique', 'targetClass' => 'app\models\tables\GeneralInformation']
	];
}

public function signup(){
    $id_user = mt_rand(11111111, 99999999);
	$auth_key = mt_rand(423, 441234);
	$token = mt_rand(0, 100);
	$user = new GeneralInformation();
	$user->id_user = $id_user;
	$user->accessToken = $token; 
	$user->Auth_key = $auth_key;
	$user->Name = $this->Name;
	$user->Surname = $this->Surname;
	$user->username = $this->username;
	$user->Password = md5($this->Password);
	/* self::AddRole($id_user); */
	return $user->save();
}
public function AddRole($id_user){
	  $auth=Yii::$app->authManager;
      $ss = $auth->getRole('editor');
	  $auth-> assign($ss, $id_user); 
   return true;
}
public function frend($iam, $user)
{
$Frend = Frends::find()
->where(['_user' => $iam])
->all();
foreach($Frend as $var){
if($var->frend == null)
{ 
echo "Не в друзьях";
}
elseif($var->frend == $user){echo "Этот пользователь у вас в друзьях!";}
    }
}
}
