<?php

namespace api\modules\controllers;

use yii\rest\ActiveController;
use api\models\Car;

class CarController extends ActiveController
{
    public $modelClass = 'api\models\Car';

    public function actionIndex()
    {
        var_dump('adsf');die;
        return $this->render('index');
    }

}
