<?php

namespace backend\modules\repair\models;

use Yii;

/**
 * This is the model class for table "repairman".
 *
 * @property int $id
 * @property int|null $ticket_id ใบแจ้งซ่อม
 * @property string|null $ticket_number เลขที่ใบแจ้งซ่อม
 * @property string|null $technician_team ทีมช่าง
 * @property string|null $repair_start วันที่เริ่มซ่อม
 * @property string|null $repair_end วันที่ซ่อมเสร็จ
 * @property int|null $repair_type_id ประเภทการซ่อม
 * @property string|null $spare_part รายการอะไหล่
 * @property float|null $cost ค่าใช้จ่าย
 * @property string|null $image รูปภาพ
 * @property string|null $comment ความคิดเห็น
 *
 * @property RepairType $repairType
 * @property Repair $ticket
 */
class Repairman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repairman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id', 'repair_type_id'], 'integer'],
            [['repair_start', 'repair_end'], 'safe'],
            [['spare_part', 'image', 'comment'], 'string'],
            [['cost'], 'number'],
            [['ticket_number'], 'string', 'max' => 100],
            [['technician_team'], 'string', 'max' => 255],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Repair::class, 'targetAttribute' => ['ticket_id' => 'id']],
            [['repair_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RepairType::class, 'targetAttribute' => ['repair_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ticket_id' => Yii::t('app', 'ใบแจ้งซ่อม'),
            'ticket_number' => Yii::t('app', 'เลขที่ใบแจ้งซ่อม'),
            'technician_team' => Yii::t('app', 'ทีมช่าง'),
            'repair_start' => Yii::t('app', 'วันที่เริ่มซ่อม'),
            'repair_end' => Yii::t('app', 'วันที่ซ่อมเสร็จ'),
            'repair_type_id' => Yii::t('app', 'ประเภทการซ่อม'),
            'spare_part' => Yii::t('app', 'รายการอะไหล่'),
            'cost' => Yii::t('app', 'ค่าใช้จ่าย'),
            'image' => Yii::t('app', 'รูปภาพ'),
            'comment' => Yii::t('app', 'ความคิดเห็น'),
        ];
    }

    /**
     * Gets query for [[RepairType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairType()
    {
        return $this->hasOne(RepairType::class, ['id' => 'repair_type_id']);
    }

    /**
     * Gets query for [[Ticket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Repair::class, ['id' => 'ticket_id']);
    }
}
