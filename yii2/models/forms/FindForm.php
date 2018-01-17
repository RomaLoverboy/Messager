<?php
namespace app\models\forms;
use Yii;
use yii\db\Command;
use yii\db\ActiveForm;
use yii\base\Model;
use yii\db\ActionRecord;
use app\models\tables\Intereses;
use app\models\tables\GeneralInformation;
use yii\Helpers\Html;
class FindForm extends Model
{
	public $Find;

public function rules() 
{
	
	return [
	['Find', 'required']
	];
}

public function showFind($find)
{
	$Find = GeneralInformation::find()
    ->select(['id_user', 'Name', 'Surname', 'username'])
    ->where(['like', 'Name', $find])
    ->all();
	return $Find;
}
}
?>