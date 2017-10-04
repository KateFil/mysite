<?php

use yii\db\Migration;

class m170929_122623_categories extends Migration
{
    public function safeUp()
    {
        $this->createTable('categories',[
            'id'=>$this->primaryKey(11)->notNull(),
            'name'=>$this->string(30)->notNull()
        ]);

        $this->insert('categories',['name'=>'планшеты']);
        $this->insert('categories',['name'=>'ноутбуки']);
        $this->insert('categories',['name'=>'фотоаппараты']);
        $this->insert('categories',['name'=>'мобильные телефоны']);
        $this->insert('categories',['name'=>'телевизоры']);

    }

    public function safeDown()
    {
        $this->dropTable('categories');

    }

}
