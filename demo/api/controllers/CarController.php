<?php
namespace api\controllers;

use yii\rest\ActiveController;

class CarController extends ActiveController
{
    public $modelClass = 'api\models\Car';

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}