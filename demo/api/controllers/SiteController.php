<?php

namespace api\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class'=> 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionIndex()
    {
    }


}
