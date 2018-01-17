<?php
namespace app\models\forms;
use Yii;
use app\models\tables\Posts;
use yii\web\UploadedFile;

class PostsForm extends Posts
{
	public $Title;
	public $Texte;
	public $Reference;

	public function rules() {
	
	return [
	[['Title', 'Texte'], 'required'],
	];
    }
	
    public function upload(){
    if($this->validate()){
    $this->image->saveAs("images/posts/{$this->files->baseName}.{$this->files->extension}");
	$stream = "images/posts/{$this->files->baseName}.{$this->files->extension}";
	return $stream;
	}else{
    return false;
	}
	}
	
	public function signup($id_group){

	$posts = new Posts();
    $posts->id_post = mt_rand(111111111, 999999999);
    $posts->Title = $this->Title;
	$posts->Texte = $this->Texte;
	$posts->autor = \Yii::$app->user->getId();
    $posts->_group = $id_group;
	return $posts->save();
}
    public function showPosts($group)
    {
		$Show = Posts::find()
	    ->where(['_group'=>$group])
		->all();
		return $Show;
	}
}