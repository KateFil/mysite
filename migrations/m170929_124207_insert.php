<?php

use yii\db\Migration;

class m170929_124207_insert extends Migration
{
    public function safeUp()
    {
        $this->insert('goods',['name'=>'samsung', 'model'=>'Galaxy S8 Dual SIM 64GB', 'description'=>'описание телефона самсунг', 'price'=>450,'cat_id'=>4]);
        $this->insert('goods',['name'=>'apple', 'model'=>'iPhone 7 32GB',  'description'=>'описание айфона', 'price'=>500, 'cat_id'=>4]);
        $this->insert('goods',['name'=>'asus',  'model'=>'ZenBook UX410UQ-GV031T',  'description'=>'описание ноутбука asus', 'price'=>800,'cat_id'=>2]);
        $this->insert('goods',['name'=>'hp',  'model'=>'Pavilion 15-cc008ur [2CP09EA]', 'description'=>'описание ноутбука hp', 'price'=>740,'cat_id'=>2]);
        $this->insert('goods',['name'=>'lenovo', 'model'=>'Tab 10 TB-X103F 16GB ', 'description'=>'описание планшета леново', 'price'=>250, 'cat_id'=>1]);
        $this->insert('goods',['name'=>'canon', 'model'=>'EOS 6D Body', 'description'=>'описание фотоаппарата canon', 'price'=>680, 'cat_id'=>3]);
    }

    public function safeDown()
    {

        $this->truncateTable('goods');

    }

}
