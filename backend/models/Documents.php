<?php

namespace backend\models;

use backend\models\Categories;
use backend\models\Status;
use common\models\User;
use DateTime;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\BaseActiveRecord;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property string $numbers รหัสเอกสาร
 * @property string $title ชื่อเอกสาร
 * @property string|null $description รายละเอียด
 * @property string|null $created_at วันที่เอกสาร
 * @property string|null $updated_at วันที่ปรับปรุง
 * @property int|null $created_by ผู้สร้าง
 * @property int|null $updated_by ผู้ปรับปรุง
 * @property int|null $categories_id หมวดหมู่
 * @property int|null $status_id สถานะ
 * @property string|null $ref อ้างอิง
 * @property string|null $docs ไฟล์เอกสาร
 *
 * @property Categories $categories
 * @property Status $status
 */
class Documents extends \yii\db\ActiveRecord
{

    const UPLOAD_FOLDER = 'uploads';

    // public $pdf_file;


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at'],
                    self::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
            [
                'class' => BlameableBehavior::class,
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
            ],
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'numbers', // required
                // 'group' => $this->id_branch, // optional
                'value' => date('Ym') . '-?', // format auto number. '?' will be replaced with generated number
                'digit' => 3 // optional, default to null. 
            ],
        ];
    }

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
            [['numbers', 'title', 'categories_id', 'status_id'], 'required'],
            [['numbers'], 'autonumber', 'format' => date('Ym') . '-?'],
            [['description'], 'string'],
            [['created_at', 'updated_at', 'expiration_date'], 'safe'],
            [['created_by', 'updated_by', 'categories_id', 'status_id', 'document_date'], 'integer'],
            [['numbers', 'title', 'ref'], 'string', 'max' => 255],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['categories_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            // [['pdf_file'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'pdf'],
            [['docs'], 'file', 'maxFiles' => 10, 'skipOnEmpty' => true]
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
            'expiration_date' => Yii::t('app', 'วันที่หมดอายุ'),
            'created_at' => Yii::t('app', 'วันที่เอกสาร'),
            'updated_at' => Yii::t('app', 'วันที่ปรับปรุง'),
            'created_by' => Yii::t('app', 'ผู้สร้าง'),
            'updated_by' => Yii::t('app', 'ผู้ปรับปรุง'),
            'categories_id' => Yii::t('app', 'หมวดหมู่'),
            'status_id' => Yii::t('app', 'สถานะ'),
            'ref' => Yii::t('app', 'อ้างอิง'),
            'docs' => Yii::t('app', 'ไฟล์เอกสาร'),
            'expiration' => Yii::t('app', 'หมดอายุ'),
            'document_date' => Yii::t('app', 'เตือนหมดอายุ (วัน)'),
            // 'pdf_file' => Yii::t('app', 'ไฟล์เอกสาร'),
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



    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }


    public function listDownloadFiles($type)
    {
        $docs_file = '';
        if (in_array($type, ['docs'])) {
            $data = $type === 'docs' ? $this->docs : '';
            $files = Json::decode($data);
            if (is_array($files)) {
                $docs_file = '<ul>';
                foreach ($files as $key => $value) {
                    if (strpos($value, '.jpg') !== false || strpos($value, '.jpeg') !== false || strpos($value, '.png') !== false || strpos($value, '.gif') !== false) {
                        $thumbnail = Html::img(['/documents/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['class' => 'img-thumbnail', 'alt' => 'Image', 'style' => 'width: 150px']);
                        $fullSize = Html::a($thumbnail, ['/documents/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['target' => '_blank']);
                        $docs_file .= '<li>' . $fullSize . '</li>';
                    } else {
                        $docs_file .= '<li>' . Html::a($value, ['/documents/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value]) . '</li>';
                    }
                }
                $docs_file .= '</ul>';
            }
        }

        return $docs_file;
    }

    
    // public function initialPreview($data, $field, $type = 'file')
    // {
    //     $initial = [];
    //     $files = Json::decode($data);
    //     if (is_array($files)) {
    //         foreach ($files as $key => $value) {
    //             if ($type == 'file') {
    //                 $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
    //             } elseif ($type == 'config') {
    //                 $initial[] = [
    //                     'caption' => $value,
    //                     'width'  => '120px',
    //                     'url'    => Url::to(['/freelance/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
    //                     'key'    => $key
    //                 ];
    //             } else {
    //                 $initial[] = Html::img(self::getUploadUrl() . $this->ref . '/' . $value, ['class' => 'file-preview-image', 'alt' => $this->file_name, 'title' => $this->file_name]);
    //             }
    //         }
    //     }
    //     return $initial;
    // }


    public function isImage($filePath)
    {
        return @is_array(getimagesize($filePath)) ? true : false;
    }


    public function initialPreview($data, $field, $type = 'file')
    {
        $initial = [];
        $files = Json::decode($data);
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                $filePath = self::getUploadUrl() . $this->ref . '/' . $value;
                $filePathDownload = self::getUploadUrl() . $this->ref . '/' . $value;

                $isImage = $this->isImage($filePath);

                if ($type == 'file') {
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                } elseif ($type == 'config') {
                    $initial[] = [
                        'caption' => $value,
                        'width'  => '120px',
                        'url'    => Url::to(['documents/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
                        'key'    => $key
                    ];
                } else {
                    if ($isImage) {
                        $file = Html::img($filePath, ['class' => 'file-preview-image', 'alt' => $this->file_name, 'title' => $this->file_name]);
                    } else {
                        $file = Html::a('View File', $filePathDownload, ['target' => '_blank']);
                    }
                    $initial[] = $file;
                }
            }
        }
        return $initial;
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }


    // ฟังก์ชันคำนวณจำนวนวันที่เหลือจนถึงวันหมดอายุ
    public function getDaysToExpiration()
    {
        $currentTimestamp = new DateTime();
        $expirationTimestamp = new DateTime($this->expiration_date);

        // ตัวอย่าง: วันที่หมดอายุคือ 2023-08-15 และวันปัจจุบันคือ 2023-07-19
        // วันที่หมดอายุ - วันปัจจุบัน = 27 วัน
        $interval = $currentTimestamp->diff($expirationTimestamp);
        $daysToExpiration = $interval->days;

        return ($daysToExpiration >= 0) ? $daysToExpiration : 0;
    }


    // ฟังก์ชันตรวจสอบว่าก่อนถึงวันหมดอายุ 1 เดือนหรือไม่
    public function isExpiringSoon()
    {
        $currentTimestamp = time();
        $expirationTimestamp = strtotime($this->expiration_date);

        // คำนวณวันที่หมดอายุ 1 เดือนก่อนวันหมดอายุ
        $oneMonthBeforeExpiration = strtotime('-1 month', $expirationTimestamp);

        return ($currentTimestamp < $oneMonthBeforeExpiration);
    }
}
