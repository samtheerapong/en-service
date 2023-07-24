<?php

use yii\db\Migration;

/**
 * Class m230724_071653_create_uploads
 */
class m230724_071653_create_uploads extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%photo_library}}', [
            'id' => $this->primaryKey(),
            'ref' => $this->string(255)->defaultValue(null),
            'event_name' => $this->string(255)->defaultValue(null)->comment('ชื่องาน'),
            'detail' => $this->text()->comment('รายละเอียด'),
            'start_date' => $this->date()->defaultValue(null)->comment('วันที่เริ่มถ่ายภาพ'),
            'end_date' => $this->date()->defaultValue(null)->comment('วันที่ถ่ายภาพเสร็จ'),
            'location' => $this->string(255)->defaultValue(null)->comment('สถานที่'),
            'customer_name' => $this->string(150)->defaultValue(null)->comment('ชื่อลูกค้า'),
            'customer_mobile_phone' => $this->string(20)->defaultValue(null)->comment('เบอร์โทร'),
            'real_filename' => $this->string(255)->defaultValue(null)->comment('ชื่อไฟล์จริง'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->createTable('{{%uploads}}', [
            'upload_id' => $this->primaryKey(),
            'ref' => $this->string(255)->defaultValue(null),
            'file_name' => $this->string(255)->defaultValue(null)->comment('ชื่อไฟล์'),
            'real_filename' => $this->string(255)->defaultValue(null)->comment('ชื่อไฟล์จริง'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the 'auto_number' table
        $this->dropTable('{{%photo_library}}');

        // Drop the 'auto_number' table
        $this->dropTable('{{%uploads}}');
    }
}
