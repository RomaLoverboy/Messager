<?php

use yii\db\Migration;

/**
 Seven tables: General_information, Conversation, dialogs, 
Posts, Notification, user_and_groups, Group_ch
 */
class m180112_074629_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
       $this->createTable('General_information', [
            'id_user' => 'int(11) PRIMARY KEY',
            'Name' => $this->string()->notNull(),
            'Surname' => $this->string()->notNull(),
            'avatar' => $this->string()->defaultValue('images/avatars/not-avatar.jpg'),
            'username' => $this->string()->notNull(),
            'accessToken' => $this->integer(),
            'Password' => $this->string()->notNull(),
            'Auth_key' => $this->integer(),
        ]);
        
        $this->createTable('dialogs', [
            'id_dialog' =>'int(11) PRIMARY KEY',
            'user_1' => $this->integer(),
            'user_2' => $this->integer(),
        ]);
        
        $this->createIndex(
            'idx-dialogs-user_1',
            'dialogs',
            'user_1'
        );

        $this->addForeignKey(
            'fk-dialogs-user_1',
            'dialogs',
            'user_1',
            'General_information',
            'id_user',
            'CASCADE'
        );

        $this->createIndex(
            'idx-dialogs-user_2',
            'dialogs',
            'user_2'
        );
        
        $this->addForeignKey(
            'fk-dialogs-user_2',
            'dialogs',
            'user_2',
            'General_information',
            'id_user',
            'CASCADE'
        );  

        $this->createTable('Conversation', [
            'id' => $this->primaryKey(),
            '_from' => $this->integer(),
            '_to' => $this->integer(),
            '_title' => $this->string(),
            '_reply' => $this->text(),
            'status' => $this->integer()->defaultValue(1),
            'datetime' => $this->integer(),
            'key_dialog' => $this->integer(),
        ]);
        
        $this->createIndex(
            'idx-Conversation-key_dialog',
            'Conversation',
            'key_dialog'
        );
        
        $this->addForeignKey(
            'fk-Conversation-key_dialog',
            'Conversation',
            'key_dialog',
            'dialogs',
            'id_dialog',
            'CASCADE'
        );
        
        $this->createIndex(
            'idx-Conversation-_from',
            'Conversation',
            '_from'
        );

        $this->addForeignKey(
            'fk-Conversation-_from',
            'Conversation',
            '_from',
            'General_information',
            'id_user',
            'CASCADE'
        );
        
        $this->createIndex(
            'idx-Conversation-_to',
            'Conversation',
            '_to'
        );
       
        $this->addForeignKey(
            'fk-Conversation-_to',
            'Conversation',
            '_to',
            'General_information',
            'id_user',
            'CASCADE'
        );
       
        $this->createTable('Group_ch', [
            'id_groups' => 'int(11) PRIMARY KEY',
            'group_name' => $this->string(),
            'theme_group' => $this->string(),
            'autor' => $this->integer(),
            'image' => $this->string()->defaultValue('images/headers/head.jpg'),
        ]);
         $this->createIndex(
            'idx-Group_ch-autor',
            'Group_ch',
            'autor'
        );
        $this->addForeignKey(
            'fk-Group_ch-autor',
            'Group_ch',
            'autor',
            'General_information',
            'id_user',
            'CASCADE'
        );


        $this->createTable('users_and_groups', [
            'id_table' => $this->primaryKey(),
            'id_users' => $this->integer(),
            'id_group' => $this->integer(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    
        $this->createIndex(
            'idx-users_and_groups-id_users',
            'users_and_groups',
            'id_users'
        );

        $this->addForeignKey(
            'fk-users_and_groups-id_users',
            'users_and_groups',
            'id_users',
            'General_information',
            'id_user',
            'CASCADE'
        );

        $this->createIndex(
            'idx-users_and_groups-id_group',
            'users_and_groups',
            'id_group'
        );
        
        $this->addForeignKey(
            'fk-users_and_groups-id_group',
            'users_and_groups',
            'id_group',
            'Group_ch',
            'id_groups',
            'CASCADE'
        );  
        
        $this->createTable('Posts', [
            'id_post' => 'int(11) PRIMARY KEY',
            'Title' => $this->string(),
            'Texte' => $this->text(),
            'autor' => $this->integer(),
            '_group' => $this->integer(),
        ]);
        
        $this->createIndex(
            'idx-Posts-autor',
            'Posts',
            'autor'
        );

        $this->addForeignKey(
            'fk-Posts-autor',
            'Posts',
            'autor',
            'General_information',
            'id_user',
            'CASCADE'
        );

        $this->createIndex(
            'idx-Posts-_group',
            'Posts',
            '_group'
        );
        
        $this->addForeignKey(
            'fk-Posts-_group',
            'Posts',
            '_group',
            'Group_ch',
            'id_groups',
            'CASCADE'
        );  
        
        $this->createTable('Notification', [
            'id_not' => 'int(11) PRIMARY KEY',
            'Notification' => $this->text(),
            '_from' => $this->integer(), 
            '_to' => $this->integer(),
            'params' => $this->string(),
        ]);
        
        $this->createIndex(
            'idx-Notification-_from',
            'Notification',
            '_from'
        );

        $this->addForeignKey(
            'fk-Notification-_to',
            'Notification',
            '_to',
            'General_information',
            'id_user',
            'CASCADE'
        );

        $this->createIndex(
            'idx-Notification-_to',
            'Notification',
            '_to'
        );
       
        $this->addForeignKey(
            'fk-Notification-_from',
            'Notification',
            '_from',
            'General_information',
            'id_user',
            'CASCADE'
        );
    }

    public function down()
    {

    }
}
