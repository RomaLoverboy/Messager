<?php
namespace app\models\forms;
use app\models\tables\Group;
use yii\base\Model;
use app\models\tables\usersandgroups;
?>
<?php
class CreateGroupForm extends Model
{
  public $theme_group, $group_name;
  public function rules(){
  return [
  [['theme_group', 'group_name'], 'required'],
  ];
  }
  public function addToGroup($user, $group){
  $Group_user = new usersandgroups();
  $Group_user->id_users = $user;
  $Group_user->id_group = $group;
  return $Group_user->save();
}
  public function createGroup($autor, $group)
  {
    $Group = new Group();
    $Group->id_groups = $group;
    $Group->group_name = $this->group_name;
    $Group->theme_group = $this->theme_group;
    $Group->autor = $autor;
    return $Group->save();
  }
  public function createGroupAndaddToGroup($autor, $group){
  $Group_user = new usersandgroups();
  $Group_user->id_users = $autor;
  $Group_user->id_group = $group;
  self::createGroup($autor, $group);
  return $Group_user->save();
}
}
?>