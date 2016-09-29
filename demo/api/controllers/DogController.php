<?php
namespace api\controllers;

use yii\rest\ActiveController;

class DogController extends ActiveController
{
    public $modelClass = 'api\models\Dog';

}
