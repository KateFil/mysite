<?php

namespace app\modules\api\controllers;

use Yii;
use app\models\Goods;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\ContentNegotiator;

/**
 * Default controller for the `api` module
 */
class GoodsController extends Controller
{

     public function behaviors()
     {
         $behaviors = parent::behaviors();
         $behaviors['contentNegotiator'] = [
             'class' => ContentNegotiator::className(),
             'formats' => [
                 'application/json' => Response::FORMAT_JSON,
             ],
         ];
         return $behaviors;
    }


    public function actionList() {
       // Yii::$app->response->format = Response::FORMAT_JSON;
        $list = Goods::getList();
        return $list;
    }


    public function actionView($id)
    {


    }

    public static function  actionCreate()
    {

    }

    public function actionUpdate(){

    }


}
