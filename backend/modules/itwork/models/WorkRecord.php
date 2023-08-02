<?php

namespace backend\modules\itwork\models;

use Yii;

/**
 * This is the model class for table "work_record".
 *
 * @property int $id
 * @property string|null $work_number เลขที่งาน
 * @property int|null $priority_id ความสำคัญ
 * @property int|null $work_group_id กลุ่ม
 * @property int|null $work_type_id ประเภท
 * @property string|null $title หัวข้อ
 * @property string|null $description รายละเอียด
 * @property string|null $start_date เริ่ม
 * @property string|null $end_date เสร็จ
 * @property string|null $images รูปภาพ
 * @property string|null $docs เอกสาร
 * @property string|null $member ผู้ปฏิบัติงาน
 * @property float|null $cost ค่าใช้จ่าย
 * @property int|null $work_status_id สถานะ
 *
 * @property WorkPriority $priority
 * @property WorkGroup $workGroup
 * @property WorkStatus $workStatus
 * @property WorkType $workType
 */
class WorkRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priority_id', 'work_group_id', 'work_type_id', 'work_status_id'], 'integer'],
            [['description', 'images', 'docs', 'member'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['cost'], 'number'],
            [['work_number'], 'string', 'max' => 45],
            [['title'], 'string', 'max' => 200],
            [['work_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkGroup::class, 'targetAttribute' => ['work_group_id' => 'id']],
            [['priority_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkPriority::class, 'targetAttribute' => ['priority_id' => 'id']],
            [['work_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkStatus::class, 'targetAttribute' => ['work_status_id' => 'id']],
            [['work_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkType::class, 'targetAttribute' => ['work_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'work_number' => Yii::t('app', 'เลขที่งาน'),
            'priority_id' => Yii::t('app', 'ความสำคัญ'),
            'work_group_id' => Yii::t('app', 'กลุ่ม'),
            'work_type_id' => Yii::t('app', 'ประเภท'),
            'title' => Yii::t('app', 'หัวข้อ'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'start_date' => Yii::t('app', 'เริ่ม'),
            'end_date' => Yii::t('app', 'เสร็จ'),
            'images' => Yii::t('app', 'รูปภาพ'),
            'docs' => Yii::t('app', 'เอกสาร'),
            'member' => Yii::t('app', 'ผู้ปฏิบัติงาน'),
            'cost' => Yii::t('app', 'ค่าใช้จ่าย'),
            'work_status_id' => Yii::t('app', 'สถานะ'),
        ];
    }

    /**
     * Gets query for [[Priority]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkPriority()
    {
        return $this->hasOne(WorkPriority::class, ['id' => 'priority_id']);
    }

    /**
     * Gets query for [[WorkGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkGroup()
    {
        return $this->hasOne(WorkGroup::class, ['id' => 'work_group_id']);
    }

    /**
     * Gets query for [[WorkStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkStatus()
    {
        return $this->hasOne(WorkStatus::class, ['id' => 'work_status_id']);
    }

    /**
     * Gets query for [[WorkType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkType()
    {
        return $this->hasOne(WorkType::class, ['id' => 'work_type_id']);
    }
}
