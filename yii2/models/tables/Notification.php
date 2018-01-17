<?php
namespace app\models\tables;

use Yii;
use yii\db\ActiveRecord;

class Notification extends ActiveRecord
{
   
    public static function tableName()
    {
        return 'Notification';
    }

}