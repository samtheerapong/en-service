<?php

namespace backend\modules\repair\models;

use Yii;

/**
 * This is the model class for table "repair_type".
 *
 * @property int $id
 * @property string|null $code รหัส
 * @property string|null $name ชื่อ
 * @property string|null $color สี
 *
 * @property Repairman[] $repairmen
 */
class RepairType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repair_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'color'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'รหัส'),
            'name' => Yii::t('app', 'ชื่อ'),
            'color' => Yii::t('app', 'สี'),
        ];
    }

    /**
     * Gets query for [[Repairmen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairmen()
    {
        return $this->hasMany(Repairman::class, ['repair_type_id' => 'id']);
    }
}
