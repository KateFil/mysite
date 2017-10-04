<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $name
 * @property string $model
 * @property string $description
 * @property integer $price
 * @property integer $cat_id
 *
 * @property Categories $cat
 */
class Goods extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'model', 'description', 'price', 'cat_id'], 'required'],
            [['price', 'cat_id'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['model'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'model' => 'Модель',
            'description' => 'Описание',
            'price' => 'Цена',
            'cat_id' => 'ID категории товаров',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }


    public static function getList(){
        $list = Categories::find()->with('goods')->asArray()->all();// забирает категории с товарами внутри каждой категории
        if($list!= null){
            return $list;
        }
        else{
            $error = ['error'=>'По данному запросу нет данных!'];
            return $error;
        }
    }

    public static function getView($id)
    {
        if($id !== null){
            $view = Goods::find()->with('cat')->where(['id'=>$id])->asArray()->limit(1)->one();
            if(isset($view)){
                return $view;
            }
            else{
                $error = ['error'=>'товара с таким id нет'];
                return $error;
            }
        }
    }

    public static function create($newGood){
        if($newGood->save()){
            $success = ['success'=>'Товар успешно добавлен', 'id'=>$newGood->id];
            return $success;
        }
    }

    public static function remove($id){

        $view = Goods::findGoogObj($id);

            if(!isset($view['error'])){
                $view->delete();
                $success = ['success'=>'товара удален'];
                return $success;
            }
            else{
                return $view;
            }

    }

    public static function makeUpdate($good){
        if($good->save()){
            $success = ['success'=>'Товар успешно добавлен', 'id'=>$good->id];
            return $success;
            // return json_encode($success,JSON_UNESCAPED_UNICODE);
        }

    }

    public static function findGoogObj($id){
        $good = Goods::find()->where(['id'=>$id])->limit(1)->one();
        if(isset($good)){
            return $good;
        }
        else{
            $error = ['error'=>'Error: товара с таким id нет!'];
            return $error;
        }
    }


}
