<?php
namespace api\controllers;

use yii\rest\ActiveController;
use yii\filters\RateLimiter;
use yii\filters\auth\QueryParamAuth;

class EmpController extends ActiveController
{
    public $modelClass = 'api\models\SysEmployee';

    public function behaviors()
    {
        return [
            'rateLimiter' => [
                'class' => RateLimiter::className(),
                'enableRateLimitHeaders' => true,
            ],
            'authenticator' => [
                QueryParamAuth::className(),
            ],
        ];
    }
}