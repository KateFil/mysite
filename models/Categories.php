<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Goods[] $goods
 */
class Categories extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'categories';
    }


    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название категории',
        ];
    }

     public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['cat_id' => 'id']);
    }

}
