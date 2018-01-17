<?php
namespace app\models\other;
use app\models\tables\GeneralInformation; 
use yii\base\Model;
?>

<?php 
class Session_user extends Model
{
	
 public function identity($identity)
 {
    $_identity = GeneralInformation::find()
	->where(['id_user' => $identity])
	->all();
?>
 <?php foreach($_identity as $bar){ ?>
	   
	   <img src = "<?=$bar->avatar?>" height = "40" width = "40" class="img-circle"/>
	   <?=$bar->Name?>
       <?=$bar->Surname?>
       
<?php	
  }
 }
}
?>
