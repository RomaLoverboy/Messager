<?php
namespace app\models\other;
use app\models\tables\Conversation; 
use app\models\tables\GeneralInformation;
use yii\base\Model;
use app\models\tables\usersandgroups;

class counts Extends Model
{
   public function counts($id_user, $my_id)
   {
	   $not_read = 1;
	   $count = Conversation::find()
	   ->select('count(status)')
	   ->where(['status'=>$not_read, '_to' =>$my_id, '_from'=>$id_user])
	   ->scalar();
	   return $count;
   }
   public function counts_users_to_group()
   {
	   $count = usersandgroups::find()
	   ->select('count(distinct(id_users))')
	   ->scalar();
	   return $count;
   }
   public function readMessage($id_user, $my_id){
	   $null = 0;
	   $read = Conversation::find()
	   ->where(['_from'=>$id_user, '_to'=>$my_id])
	   ->all();
       foreach ($read as $var) {
       $var->status = $null;
       $var->update(false);
       }
	   }

   }
?>