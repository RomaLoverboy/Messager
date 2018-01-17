<?php
namespace app\models\tables;

use Yii;
use app\models\tables\GeneralInformation;

/**
 * This is the model class for table "General_information".
 *
 * @property integer $id_user
 * @property string $Name
 * @property string $Surname
 * @property string $username
 * @property string $accessToken
 * @property string $Password
 * @property string $Auth_key
 */
class Posts extends GeneralInformation
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Posts';
    }

}