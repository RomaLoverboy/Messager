<?php
namespace app\models\tables; 
use yii\db\ActiveRecord;

class Group extends ActiveRecord
{
  public static function tableName()
  {
    return 'Group_ch';
  }
}
?>