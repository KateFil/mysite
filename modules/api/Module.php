<?php

namespace app\modules\api;
use yii\web\Response;
use yii\filters\ContentNegotiator;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{



    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\api\controllers';
    public $defaultRoute = 'goods';
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();


        // custom initialization code goes here
    }



}
