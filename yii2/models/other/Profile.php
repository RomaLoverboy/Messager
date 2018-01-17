<?php
namespace app\models\other;
use app\models\tables\GeneralInformation;
use yii\base\Model;
use app\models\tables\Group;

class Profile extends Model
{
	
  public function showProfile($id_user)
  {
	$model = GeneralInformation::find()
	->where(['id_user' => $id_user])
	->all();
	return $model;
  }

}
?>