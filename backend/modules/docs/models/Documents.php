<?php

namespace backend\modules\docs\models;

use backend\models\User;
use DateTime;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property string|null $numbers รหัสเอกสาร
 * @property string|null $title ชื่อเอกสาร
 * @property string|null $description รายละเอียด
 * @property string|null $expiration_date วันที่หมดอายุ
 * @property int|null $days_left เตือนหมดอายุ (วัน)
 * @property string|null $created_at สร้างเมื่อ
 * @property string|null $updated_at ปรับปรุงเมื่อ
 * @property int|null $created_by ผู้สร้าง
 * @property int|null $updated_by ผู้ปรับปรุง
 * @property int|null $categories_id หมวดหมู่
 * @property int|null $status_id สถานะเอกสาร
 * @property string|null $ref อ้างอิง
 * @property string|null $docs ไฟล์เอกสาร
 */
class Documents extends \yii\db\ActiveRecord
{

    const UPLOAD_FOLDER = 'uploads/docs';

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
                'value' => 'DOC-' . date('Ym') . '-?', // format auto number. '?' will be replaced with generated number
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
            [['numbers'], 'autonumber', 'format' => 'DOC-' . date('Ym') . '-?'],
            [['description', 'docs'], 'string'],
            [['expiration_date', 'created_at', 'updated_at'], 'safe'],
            [['days_left', 'created_by', 'updated_by', 'categories_id', 'status_id'], 'integer'],
            [['numbers', 'title', 'ref'], 'string', 'max' => 255],
            [['numbers'], 'unique'],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentCategories::class, 'targetAttribute' => ['categories_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentStatus::class, 'targetAttribute' => ['status_id' => 'id']],
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
            'days_left' => Yii::t('app', 'เตือนหมดอายุ (วัน)'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'updated_at' => Yii::t('app', 'ปรับปรุงเมื่อ'),
            'created_by' => Yii::t('app', 'ผู้สร้าง'),
            'updated_by' => Yii::t('app', 'ผู้ปรับปรุง'),
            'categories_id' => Yii::t('app', 'หมวดหมู่'),
            'status_id' => Yii::t('app', 'สถานะเอกสาร'),
            'ref' => Yii::t('app', 'อ้างอิง'),
            'docs' => Yii::t('app', 'ไฟล์เอกสาร'),
        ];
    }


    public function getCategories()
    {
        return $this->hasOne(DocumentCategories::class, ['id' => 'categories_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(DocumentStatus::class, ['id' => 'status_id']);
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
                        $thumbnail = Html::img(['/docs/documents/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['class' => 'img-thumbnail', 'alt' => 'Image', 'style' => 'width: 150px']);
                        $fullSize = Html::a($thumbnail, ['/docs/documents/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['target' => '_blank']);
                        $docs_file .= '<li>' . $fullSize . '</li>';
                    } else {
                        $docs_file .= '<li>' . Html::a($value, ['/docs/documents/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value]) . '</li>';
                    }
                }
                $docs_file .= '</ul>';
            }
        }

        return $docs_file;
    }

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
                        'url'    => Url::to(['/docs/documents/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
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
