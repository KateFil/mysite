<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 */
class Admin extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    public static function login($obj){
        $admin = Admin::find()
            ->where(['login'=>$obj->login, 'password'=>$obj->password])
            ->limit(1)
            ->one();

        if($admin!=null){
            return ['success'=>'true'];
        }
        else{
            return ['error'=>'Не верный логин или пароль'];
        }



    }
}
