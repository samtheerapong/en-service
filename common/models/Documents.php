<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property string|null $numbers รหัสเอกสาร
 * @property string $title ชื่อเอกสาร
 * @property string|null $description รายละเอียด
 * @property string|null $created_at วันที่เอกสาร
 * @property string|null $updated_at วันที่ปรับปรุง
 * @property int|null $created_by ผู้สร้าง
 * @property int|null $updated_by ผู้ปรับปรุง
 * @property int|null $categories_id หมวดหมู่
 * @property int|null $status_id สถานะ
 * @property string|null $ref อ้างอิง
 * @property string|null $files ไฟล์เอกสาร
 *
 * @property Categories $categories
 * @property Status $status
 */
class Documents extends \yii\db\ActiveRecord
{

    public $pdf_file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'files'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'categories_id', 'status_id'], 'integer'],
            [['numbers', 'title', 'ref'], 'string', 'max' => 255],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['categories_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['pdf_file'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'pdf']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'numbers' => Yii::t('app', 'รหัสเอกสาร'),
            'title' => Yii::t('app', 'ชื่อเอกสาร'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'created_at' => Yii::t('app', 'วันที่เอกสาร'),
            'updated_at' => Yii::t('app', 'วันที่ปรับปรุง'),
            'created_by' => Yii::t('app', 'ผู้สร้าง'),
            'updated_by' => Yii::t('app', 'ผู้ปรับปรุง'),
            'categories_id' => Yii::t('app', 'หมวดหมู่'),
            'status_id' => Yii::t('app', 'สถานะ'),
            'ref' => Yii::t('app', 'อ้างอิง'),
            'files' => Yii::t('app', 'ไฟล์เอกสาร'),
            'pdf_file' => Yii::t('app', 'ไฟล์เอกสาร'),
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::class, ['id' => 'categories_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }
}
