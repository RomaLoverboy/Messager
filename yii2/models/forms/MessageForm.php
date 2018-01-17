<?php
namespace app\models\forms;
use Yii;
use yii\db\ActiveForm;
use yii\base\Model;
use yii\db\ActionRecord;
use yii\Helpers\Html;
use app\models\tables\Conversation;
use app\models\tables\Dialogs;
use app\models\tables\GeneralInformation;
class MessageForm extends Model
{
    public $Title, $Text;
	
public function rules() 
{
	
	return [
	['Text', 'required']
	];
}

public function sendConversation($id_user)
{
	
	$from = \Yii::$app->user->getId();
	$to = $id_user;
	$Summ_dialog = $id_user + $from;
	$datetime = time();
	$conversation = new Conversation();
	$conversation-> _from = $from;
	$conversation-> _to = $to;
	$conversation-> _title = $this->Title;
	$conversation-> _reply = $this->Text;
	$conversation-> datetime = $datetime;
	$conversation-> key_dialog = $Summ_dialog;
	
	self::sendDialog($Summ_dialog, $to);
	return $conversation->save();
}
	
    public function sendDialog($Summ_dialog, $to)
    {
	   $Dialog = new Dialogs();
	   $Dialog->id_dialog = $Summ_dialog;
	   $Dialog->user_1 = \Yii::$app->user->getId();
       $Dialog->user_2 = $to;
 	   if($di=Dialogs::find()->select('id_dialog')->where(['id_dialog'=>$Summ_dialog])->one()){
		   return false;
	   }
	   else 
	   return $Dialog->save();
    }
    
	public function showDialogs($my_id)
    {
	   $dialogs = Dialogs::find()
	   ->where(['user_1' => $my_id])
	   ->orWhere(['user_2' => $my_id])
	   ->all();
	   return $dialogs;
	}
	
	public function showMessages($id_user, $my_id)
	{
	   $messages = Conversation::find()
	   ->innerJoin('dialogs', '`id_dialog` = `key_dialog`')
	   ->where(['user_1'=>$my_id, 'user_2' => $id_user])
	   ->orwhere(['user_1'=>$id_user, 'user_2'=>$my_id])
	   ->all();
	   return $messages;
	}
    

	}