<?php
namespace app\models\other;
use app\models\tables\GeneralInformation;
use yii\base\Model;
use app\models\tables\Group;
use app\models\tables\usersandgroups;
use app\models\other\Session_user;
?>
<?php
class Groups extends Model
{ 
   public function Group($id_group, $id_user)
   {
    $Group = Group::find()
    ->innerJoin('users_and_groups', 'id_groups = id_group')
    ->where(['id_groups'=>$id_group, 'id_users' => $id_user]) 
    ->all();
    return $Group;
}
public function showMyGroups($id_user){
$groups = Group::find()
	->select(['id_groups', 'group_name', 'theme_group', 'autor'])
    ->innerJoin('users_and_groups', '`id_groups` = `id_group`')
    ->where(['id_users' => $id_user, 'status' => 1])
	->all();
	return $groups;
}
public function showGroupsAddToGroup($id_user){
   foreach(self::showMyGroups($id_user) as $var)
   {
?>
    <li><a href = "?group=<?=$var->id_groups?>"><?=$var->group_name?></a></li>
<?php  
   }
}
public function showGroup($id_group)
{
   $Group = Group::find()
   ->where(['id_groups'=>$id_group])
   ->all();
   return $Group;
}

public function _showGroup($id_group)
{
   $Group = Group::find()
   ->where(['id_groups'=>$id_group])
   ->all();
   foreach($Group as $var)
   {?>
       <a href = "?group=<?=$var->id_groups?>"><?=$var->group_name?></a>
<?php
    }
  }
public function exitGroup($id_group, $my_id){
  $Group = usersandgroups::deleteAll(['id_users'=>$my_id, 'id_group' => $id_group]);
  return $Group;
}
public function allUsersToGroup($id_group){
	$Users = usersandgroups::find()
	->where(['id_group' => $id_group])
	->limit(3)
	->all();
	foreach($Users as $var){?>
		<p><?=Session_user::identity($var->id_users)?></p>
<?php
}
}
public function showAllUsers($id_group){
	$Users = usersandgroups::find()
	->distinct()
	->where(['id_group'=>$id_group])
    ->all();
	foreach($Users as $var){
?>
	<p><?=Session_user::identity($var->id_users)?></p>
<?php	
}
}
}
?>