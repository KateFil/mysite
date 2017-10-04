<?php

use yii\db\Migration;

class m170929_123945_foreignKey extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey('categories_id', 'goods', 'cat_id','categories', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('categories_id','goods');
    }

}
