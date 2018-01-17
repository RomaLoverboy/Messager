<?php
namespace app\commands;
use Yii;
use yii\console\Controller;
use app\rbac\AuthorRule;
use app\commands\RocController;
class RbacController extends Controller
{
public function actionInit(){
$auth = Yii::$app->authManager;
//$auth->removeAll();
$rule = new RocController;
$updatePost=$auth->createPermission('updatePost');
$updatePost->description='update Post';
$auth->add($updatePost);
$editor=$auth->createRole('editor');
$auth->add($editor);
$admin=$auth->createRole('admin');
$auth->add($admin);
$auth->addChild($admin, $updatePost);
$auth->addChild($admin, $editor);
$auth->assign($admin, 0);
$auth->assign($editor, 276059283);
$auth->add($rule);
$updateOwnPost=$auth->createPermission('updateOwnPost');
$updateOwnPost->description='Update own post';
$updateOwnPost->ruleName=$rule->name;
$auth->add($updateOwnPost);
$auth->addChild($updateOwnPost, $updatePost);
$auth->addChild($editor, $updateOwnPost);
}
}
?>