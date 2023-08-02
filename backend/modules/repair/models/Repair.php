<?php

namespace backend\modules\repair\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

// relationship
use backend\models\User;
// use backend\modules\repair\models\Department;
// use backend\modules\repair\models\RepairTeam;

/**
 * This is the model class for table "repair".
 *
 * @property int $id
 * @property string|null $ticket_number เลขที่เอกสาร
 * @property string|null $title เรื่อง
 * @property string|null $details คำอธิบาย
 * @property string|null $request_date วันที่ร้องขอ
 * @property string|null $created_at วันที่แจ้ง
 * @property string|null $updated_at ปรับปรุงเมื่อ
 * @property int|null $created_by ผู้แจ้ง
 * @property int|null $updated_by ผู้ปรับปรุง
 * @property int|null $repair_priority_id ความเร่งด่วน
 * @property string|null $location สถานที่
 * @property string|null $docs ไฟล์
 * @property int|null $repair_status_id สถานะงาน
 *
 * @property RepairPriority $repairPriority
 * @property RepairStatus $repairStatus
 * @property Repairman[] $repairmen
 */
class Repair extends \yii\db\ActiveRecord
{

    // กำหนด ที่อยู่ไฟล์ เช่น uploads/repair = @backend/web/uploads/repair/
    const UPLOAD_FOLDER = 'repair';

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

            // [
            //     'class' => 'mdm\autonumber\Behavior',
            //     'attribute' => 'ticket_number', // required
            //     'value' => date('Ym') . '-???', // format auto number. '?' will be replaced with generated number
            //     'digit' => 3 // optional, default to null. 
            // ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['ticket_number'], 'autonumber', 'format' => date('Ym') . '-???'],
            [['requester_name', 'title', 'department_id', 'request_date', 'repair_team_id', 'repair_priority_id', 'repair_status_id'], 'required'],
            [['details', 'docs'], 'string'],
            [['created_at', 'updated_at', 'request_date'], 'safe'],
            [['created_by', 'updated_by', 'repair_priority_id', 'repair_status_id', 'department_id', 'repair_team_id'], 'integer'],
            [['ticket_number', 'location'], 'string', 'max' => 100],
            [['title', 'ref', 'requester_name'], 'string', 'max' => 255],
            [['repair_priority_id'], 'exist', 'skipOnError' => true, 'targetClass' => RepairPriority::class, 'targetAttribute' => ['repair_priority_id' => 'id']],
            [['repair_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => RepairStatus::class, 'targetAttribute' => ['repair_status_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['department_id' => 'id']],
            [['repair_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => RepairTeam::class, 'targetAttribute' => ['repair_team_id' => 'id']],
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
            'ticket_number' => Yii::t('app', 'เลขที่เอกสาร'),
            'title' => Yii::t('app', 'เรื่อง'),
            'details' => Yii::t('app', 'คำอธิบาย'),
            'requester_name' => Yii::t('app', 'ชื่อผู้แจ้งงาน'),
            'request_date' => Yii::t('app', 'วันที่ร้องขอ'),
            'department_id' => Yii::t('app', 'จากหน่วยงาน'),
            'repair_team_id' => Yii::t('app', 'ถึงหน่วยงาน'),
            'created_at' => Yii::t('app', 'วันที่แจ้ง'),
            'updated_at' => Yii::t('app', 'ปรับปรุงเมื่อ'),
            'created_by' => Yii::t('app', 'ผู้แจ้ง'),
            'updated_by' => Yii::t('app', 'ผู้ปรับปรุง'),
            'repair_priority_id' => Yii::t('app', 'ความเร่งด่วน'),
            'location' => Yii::t('app', 'สถานที่'),
            'docs' => Yii::t('app', 'ไฟล์'),
            'repair_status_id' => Yii::t('app', 'สถานะงาน'),
            'ref' => Yii::t('app', 'ref'),
        ];
    }




    // ******************** สร้างฟังก์ชั่นเพิ่มเติม ****************************

    // ฟังก์ชันกำหนด rootPath อัพโหลด
    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    // ฟังก์ชันสร้างรายการ ดาวน์โหลด
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
                        // Images
                        $showThumbnail = Html::img(['/repair/repair/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['class' => 'img-thumbnail', 'alt' => 'Image', 'style' => 'width: 250px']);
                        $downloadImg = Html::a($showThumbnail, ['/repair/repair/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value], ['target' => '_blank']);
                        $docs_file .= '<li>' . $downloadImg . '</li>';
                    } else {
                        // documents
                        $docs_file .= '<li>' . Html::a($value, ['/repair/repair/download', 'id' => $this->id, 'file' => $key, 'fullname' => $value]) . '</li>';
                    }
                }
                $docs_file .= '</ul>';
            }
        }

        return $docs_file;
    }

    // ฟังก์ชันตรวจว่าเป็นรูปหรือไม่
    public function isImage($filePath)
    {
        return @is_array(getimagesize($filePath)) ? true : false;
    }




    // ฟังก์ชัน initialPreview
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
                        'url'    => Url::to(['repair/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
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


    // ******************** สร้างฟังก์ชั่นเพิ่มเติม  เชื่อมโยงตาราง relationship****************************

    // hasOne
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    // hasOne
    public function getDepartment()
    {
        return $this->hasOne(Department::class, ['id' => 'department_id']);
    }

    // hasOne
    public function getRepairTeam()
    {
        return $this->hasOne(RepairTeam::class, ['id' => 'repair_team_id']);
    }

    // hasOne
    public function getRepairPriority()
    {
        return $this->hasOne(RepairPriority::class, ['id' => 'repair_priority_id']);
    }

    // hasOne
    public function getRepairStatus()
    {
        return $this->hasOne(RepairStatus::class, ['id' => 'repair_status_id']);
    }

    // hasMany
    public function getRepairmen()
    {
        return $this->hasMany(Repairman::class, ['ticket_id' => 'id']);
    }
}
