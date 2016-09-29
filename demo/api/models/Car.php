<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property integer $Sys_id
 * @property integer $id
 * @property integer $User_id
 * @property string $User_name
 * @property integer $User_idType
 * @property string $User_idNo
 * @property string $carNo
 * @property string $carBrand
 * @property string $buyDate
 * @property integer $buyPrice
 * @property integer $buyType
 * @property string $carModel
 * @property string $carVin
 * @property string $engineNo
 * @property integer $soldNum
 * @property integer $mortgageNum
 * @property string $usageType
 * @property string $producedDate
 * @property string $firstRegisterDate
 * @property integer $travelledDistance
 * @property integer $usedYears
 * @property string $insuranceType
 * @property integer $isDelete
 * @property integer $Org_id
 * @property integer $createEmp_id
 * @property integer $createEmp_pId
 * @property string $createTime
 * @property integer $updateEmp_id
 * @property integer $updateEmp_pId
 * @property string $updateTime
 * @property integer $Org_id_sp
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Sys_id', 'User_id', 'User_name', 'User_idType', 'User_idNo', 'carNo', 'buyDate', 'buyPrice', 'buyType', 'carVin', 'engineNo', 'usageType', 'producedDate', 'firstRegisterDate', 'travelledDistance', 'usedYears', 'isDelete', 'Org_id', 'createEmp_id', 'createEmp_pId', 'createTime', 'updateEmp_id', 'updateEmp_pId', 'updateTime', 'Org_id_sp'], 'required'],
            [['Sys_id', 'User_id', 'User_idType', 'buyPrice', 'buyType', 'soldNum', 'mortgageNum', 'travelledDistance', 'usedYears', 'isDelete', 'Org_id', 'createEmp_id', 'createEmp_pId', 'updateEmp_id', 'updateEmp_pId', 'Org_id_sp'], 'integer'],
            [['buyDate', 'producedDate', 'firstRegisterDate', 'createTime', 'updateTime'], 'safe'],
            [['User_name', 'carNo', 'carBrand', 'carModel', 'carVin', 'engineNo'], 'string', 'max' => 20],
            [['User_idNo', 'usageType', 'insuranceType'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Sys_id' => 'Sys ID',
            'id' => 'ID',
            'User_id' => 'User ID',
            'User_name' => 'User Name',
            'User_idType' => 'User Id Type',
            'User_idNo' => 'User Id No',
            'carNo' => 'Car No',
            'carBrand' => 'Car Brand',
            'buyDate' => 'Buy Date',
            'buyPrice' => 'Buy Price',
            'buyType' => 'Buy Type',
            'carModel' => 'Car Model',
            'carVin' => 'Car Vin',
            'engineNo' => 'Engine No',
            'soldNum' => 'Sold Num',
            'mortgageNum' => 'Mortgage Num',
            'usageType' => 'Usage Type',
            'producedDate' => 'Produced Date',
            'firstRegisterDate' => 'First Register Date',
            'travelledDistance' => 'Travelled Distance',
            'usedYears' => 'Used Years',
            'insuranceType' => 'Insurance Type',
            'isDelete' => 'Is Delete',
            'Org_id' => 'Org ID',
            'createEmp_id' => 'Create Emp ID',
            'createEmp_pId' => 'Create Emp P ID',
            'createTime' => 'Create Time',
            'updateEmp_id' => 'Update Emp ID',
            'updateEmp_pId' => 'Update Emp P ID',
            'updateTime' => 'Update Time',
            'Org_id_sp' => 'Org Id Sp',
        ];
    }
}
