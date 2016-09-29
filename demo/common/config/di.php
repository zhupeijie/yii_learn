<?php
\Yii::$container->set('ali', 'common\\lib\\utils\\Ali');//第一个参数指定了Crypto里参数的名字类型
\Yii::$container->set('crypto', 'common\\lib\\utils\\Crypto');
\Yii::$container->set('dict', 'backend\\models\\system\\SysDataDictionary');
