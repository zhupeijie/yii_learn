<?php

namespace api\models\system;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "sys_employee".
 *
 * @property integer $Sys_id
 * @property integer $Org_id
 * @property integer $pId
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $job
 * @property string $birthday
 * @property string $mobile
 * @property string $email
 * @property integer $isValid
 * @property integer $isSystem
 * @property integer $isDelete
 * @property string $remark
 * @property integer $sort
 * @property string $createAt
 * @property string $updateAt
 * @property integer $Org_id_sp
 */
class SysEmployee extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Org_id', 'pId', 'username', 'password', 'name', 'job', 'isValid'], 'required'],
            [['Sys_id', 'Org_id', 'pId', 'isValid', 'isSystem', 'isDelete', 'sort', 'Org_id_sp'], 'integer'],
            [['birthday', 'createTime', 'updateTime'], 'safe'],
            [['username', 'name', 'mobile'], 'string', 'max' => 20],
            [['mobile'], 'string', 'max' => 11],
            [['job', 'email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 128, 'min' => 6],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Sys_id' => '系统ID',
            'Org_id' => '部门',
            'pId' => '直系领导',
            'id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
            'name' => '真实姓名',
            'job' => '职位',
            'birthday' => '生日',
            'mobile' => '电话',
            'email' => '邮箱',
            'isValid' => '状态',
            'isSystem' => '系统用户',
            'isDelete' => '是否删除',
            'remark' => '备注',
            'sort' => '显示排序',
            'createTime' => 'Create Time',
            'updateTime' => 'Update Time',
            'Org_id_sp' => '所属sp机构ID',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['createTime', 'updateTime'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updateTime'],
                ],
                'value' => new Expression('NOW()'), // 解决默认写实年月日格式的时间
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return self::find()->where('isDelete = 0 and isValid =1 and username = :username', [':username' => $username])->one();
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int)end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
//        return md5($password) == $this->password ? TRUE : false;
        //yii 密码加密
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

}
