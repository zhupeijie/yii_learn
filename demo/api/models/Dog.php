<?php

namespace api\models;

use yii\db\ActiveRecord;
use yii\web\Linkable;
use yii\helpers\Url;
use yii\web\Link;
use Yii;

/**
 * This is the model class for table "dog".
 *
 * @property integer $id
 * @property string $name
 * @property integer $age
 * @property integer $tizhong
 * @property string $ower
 */
class Dog extends ActiveRecord implements Linkable
{
    //过滤器
    public function behaviors()
    {
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name'], 'required'],
            [['age', 'tizhong'], 'integer'],
            [['name', 'ower'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'tizhong' => 'Tizhong',
            'ower' => 'Ower',
        ];
    }

    public function fields()
    {
        return [
            'id',
            '名字' => 'name',
            'weight' => 'tizhong',
            '年龄' => function ($model) {
                return $model->age . "个月";
            },
//            'ower'
        ];
    }

    //用于指定值为对象的字段
    public function extraFields()
    {
//        return ['profile'];
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user/view', 'id' => $this->id], true),
        ];
    }

}
