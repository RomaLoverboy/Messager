<?php
namespace app\models\tables; 
use yii\db\ActiveRecord;

class usersandgroups extends ActiveRecord
{
  public static function tableName()
  {
    return 'users_and_groups';
  }
}
?>