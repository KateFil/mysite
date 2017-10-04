<?php

use yii\db\Migration;

class m171002_125531_loginAdmin extends Migration
{
    public function safeUp()
    {
        $this->createTable('admin', [
            'id'=>$this->primaryKey(11)->notNull(),
            'login'=>$this->string(30)->notNull(),
            'password'=>$this->string(40)->notNull()
        ]);
        $this->insert('admin',['login'=>'admin', 'password'=>'admin']);
    }

    public function safeDown()
    {
        $this->dropTable('admin');
    }


}
