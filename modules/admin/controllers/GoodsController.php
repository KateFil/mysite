<?php

namespace app\modules\admin\controllers;

use app\models\Admin;
use app\models\Categories;
use Yii;
use app\models\Goods;
use yii\web\Controller;


class GoodsController extends Controller
{

    public function actionIndex() {
        if (Yii::$app->session->isActive && Yii::$app->session->get('admin') =='login'){
            $list = Goods::getList();
            return $this->render('index', ['list'=>$list]);
        }
        else{
            $admin = new Admin();
            if ($admin->load(Yii::$app->request->post()) && $admin->validate()){
                $login = Admin::login($admin);
                if(isset($login['error'])){
                    return $this->render('login', ['login'=>$login, 'admin'=>$admin]);
                }
                else{
                    Yii::$app->session->open();
                    Yii::$app->session ->set('admin', 'login');
                    $list = Goods::getList();
                    return $this->render('index', ['list'=>$list]);
                }
            }
            else{
                return $this->render('login', ['admin'=>$admin]);
            }
        }
    }

    public function actionLogout(){
        Yii::$app->session->destroy();
        return $this->redirect('index');
    }


    public function actionView($id) {
        if (Yii::$app->session->isActive && Yii::$app->session->get('admin') =='login'){
            $good = Goods::getView($id);
            return $this->render('view', ['good'=>$good]);
        }
        else{
            return $this->redirect('index');
        }

    }


    public function actionCreate() {
        if (Yii::$app->session->isActive && Yii::$app->session->get('admin') =='login') {
            $model = new Goods();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $newGood = Goods::create($model);
                return $this->redirect(['view', 'id' => $newGood['id']]);
            }
            else {
                return $this->render('create', ['model' => $model]);
            }
        }
        else {
            return $this->redirect('index');
        }
    }



    public function actionDelete($id) {
        if (Yii::$app->session->isActive && Yii::$app->session->get('admin') =='login') {
            $obj = Goods::remove($id);
            if (isset($obj['success'])) {
                return $this->redirect(['index']);
            } else {
                echo $obj['error'];
            }
        }
        else{
            return $this->redirect('index');
        }
    }



    public function actionUpdate($id) {
        if (Yii::$app->session->isActive && Yii::$app->session->get('admin') =='login') {
            $good = Goods::findGoogObj($id);
            if (isset($good['error'])) {
                echo $good['error'];
            }
            else {
                if ($good->load(Yii::$app->request->post()) && $good->validate()) {
                    $updateGood = Goods::makeUpdate($good);
                    return $this->redirect(['view', 'id' => $updateGood['id']]);
                }
                else {
                    return $this->render('update', ['model' => $good,]);
                }
            }
        }
        else{
            return $this->redirect('index');
        }
    }



}
