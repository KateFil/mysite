<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Goods;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }



}
