<?php 
namespace app\models\other;
use app\models\tables\GeneralInformation;
use yii\base\Model;
use app\models\tables\Group;
use app\models\tables\Notification;
use app\models\forms\CreateGroupForm;
?>

<?php
class Notifications extends Model
{ 
public function nameUser($iam)
   {
   $User = GeneralInformation::find()
   ->where(['id_user'=>$iam]) 
   ->all();
   foreach($User as $var){?>
   <?=$var->Name?>
   <?=$var->Surname?>
<?php   
}
}
public function addToNotification($my_id, $user, $group)
{
  $Notification = new Notification();
  $Notification->id_not = mt_rand(000000000, 999999999);
  $Notification->_from = $my_id;
  $Notification->_to = $user;
  $Notification->params = $group;
  return $Notification->save();
}
public function show_notification($my_id){
	$it_is = Notification::find()
	->where(['_to' => $my_id])
	->all();
	return $it_is;
}
public function delete_notification_group($id_not)
{   $request = \Yii::$app->request;
    if($request->post('Reject')!== 0){
	$delete = Notification::deleteAll(['id_not'=>$id_not]);
    return $delete;
}
}
public function acept_and_reject($group, $id_not){
$request = \Yii::$app->request;
$Profile = new CreateGroupForm();
if($request->post('Acept')!==0){
$Profile->addToGroup(\Yii::$app->user->getId(), $group);
$this->delete_notification_group($id_not);
}
}

}
?>