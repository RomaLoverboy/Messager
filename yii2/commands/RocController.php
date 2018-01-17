<?php
namespace app\commands;
use Yii;
use yii\rbac\Rule;
use yii\console\Controller;

class RocController extends Rule
{
public $name = 'Miron';
public function execute($user, $item, $params)
{
	if(isset($params['post'])){
		if($params['post'] == $user){
			return true;
		}
	}
	else return false;
	/* return isset($params['post']) ? $params['post']->createBy==$user : false; */
}
}