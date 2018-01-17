<?php
namespace app\models\other;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\tables\GeneralInformation;

class UploadImage extends Model{

    public $image;
    public function rules(){
        return[
        [['image'], 'file', 'extensions' => 'png, jpg'],
	];
	}
    public function upload(){
    if($this->validate()){
    $ava = \Yii::$app->session;
    $this->image->saveAs("images/avatars/{$this->image->baseName}.{$this->image->extension}");
	$stream = "images/avatars/{$this->image->baseName}.{$this->image->extension}";
	$ava['ava'] = $stream;
	}else{
    return false;
}
}
    public function updateAtatar($my_id){
	  $ses_ava = \Yii::$app->session;
	  $ses_ava = $ses_ava['ava'];
	  GeneralInformation::updateAll(['avatar' => $ses_ava], ['like', 'id_user', $my_id]);
   }
}
?>