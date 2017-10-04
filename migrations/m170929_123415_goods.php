<?php

use yii\db\Migration;

class m170929_123415_goods extends Migration
{
    public function safeUp()
    {
        $this->createTable('goods',[
            'id'=>$this->primaryKey(11)->notNull(),
            'name'=>$this->string(40)->notNull(),
            'model'=>$this->string(100)->notNull(),
            'description'=>$this->string(255)->notNull(),
            'price'=>$this->integer(11)->notNull(),
            'cat_id'=>$this->integer(11)->notNull()

        ]);

    }

    public function safeDown()
    {
        $this->dropTable('goods');
    }

}
