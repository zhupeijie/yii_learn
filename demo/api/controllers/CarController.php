<?php
namespace api\controllers;

use yii\rest\ActiveController;

class CarController extends ActiveController
{
    public $modelClass = 'api\models\Car';

    public function actionIndex()
    {
        return $this->render('index');
    }
}