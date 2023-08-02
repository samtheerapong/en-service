<?php

namespace backend\modules\itwork\models;

use Yii;

/**
 * This is the model class for table "work_type".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $color
 *
 * @property WorkRecord[] $workRecords
 */
class WorkType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'color'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'color' => Yii::t('app', 'Color'),
        ];
    }

    /**
     * Gets query for [[WorkRecords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkRecords()
    {
        return $this->hasMany(WorkRecord::class, ['work_type_id' => 'id']);
    }
}
