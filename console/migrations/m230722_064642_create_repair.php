<?php

use yii\db\Migration;

/**
 * Class m230722_064642_create_repair
 */
class m230722_064642_create_repair extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Create the 'repair' table
        $this->createTable('{{%repair}}', [
            'id' => $this->primaryKey(),
            'ticket_number' => $this->string(100)->defaultValue(null)->comment('เลขที่เอกสาร'),
            'title' => $this->string()->defaultValue(null)->comment('เรื่อง'),
            'details' => $this->text()->comment('คำอธิบาย'),
            'requester_name' => $this->string(255)->defaultValue(null)->comment('ผู้แจ้งงาน'),
            'request_date' => $this->date()->defaultValue(null)->comment('วันที่ร้องขอ'),
            'department_id' => $this->integer()->defaultValue(null)->comment('จากหน่วยงาน'),
            'repair_team_id' => $this->integer()->defaultValue(null)->comment('ถึงหน่วยงาน'),
            'created_at' => $this->datetime()->defaultValue(null)->comment('วันที่แจ้ง'),
            'updated_at' => $this->datetime()->defaultValue(null)->comment('ปรับปรุงเมื่อ'),
            'created_by' => $this->integer()->defaultValue(null)->comment('ผู้แจ้ง'),
            'updated_by' => $this->integer()->defaultValue(null)->comment('ผู้ปรับปรุง'),
            'repair_priority_id' => $this->integer()->defaultValue(null)->comment('ความเร่งด่วน'),
            'location' => $this->string(100)->defaultValue(null)->comment('สถานที่'),
            'docs' => $this->text()->comment('ไฟล์'),
            'repair_status_id' => $this->integer()->defaultValue(null)->comment('สถานะงาน'),
            'ref' => $this->string(255)->defaultValue(null),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        // Insert data into the 'repair' table
        $this->batchInsert('{{%repair}}', ['id', 'ticket_number', 'title', 'details', 'requester_name','request_date', 'department_id', 'repair_team_id','created_at', 'updated_at', 'created_by', 'updated_by', 'repair_priority_id', 'location', 'docs', 'repair_status_id', 'ref'], [
            [
                1,
                'RP202307-001',
                'ทดสอบการใช้งาน',
                '',
                'John Doe',
                '2023-08-04',
                3,
                2,
                '2023-07-21 16:42:14',
                '2023-07-21 21:41:54',
                1,
                1,
                2,
                '',
                '{"8394ba6634a75ab22708e1b52b69a1fb.jpg":"test.jpg"}',
                2,
                'RP202307-001',
            ],
            [
                2,
                'RP202307-002',
                'ทดสอบการใช้งาน2',
                '',
                'Jane Doe',
                '2023-08-04',
                5,
                1,
                '2023-07-21 16:42:14',
                '2023-07-21 21:41:54',
                1,
                1,
                2,
                '',
                '{"8b7104df65dc3245a1fc5251be8216b8.jpeg":"pexels-photo-378570.jpeg"}',
                2,
                'RP202307-002',
            ],
            // Add other rows here
        ]);

        // Create the 'repair_priority' table
        $this->createTable('{{%repair_priority}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(45)->defaultValue(null)->comment('รหัส'),
            'name' => $this->string(100)->defaultValue(null)->comment('ชื่อ'),
            'color' => $this->string(45)->defaultValue(null)->comment('สี'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        // Insert data into the 'repair_priority' table
        $this->batchInsert('{{%repair_priority}}', ['id', 'code', 'name', 'color'], [
            [1, 'Normal', 'ปกติ', '#6aa84f'],
            [2, 'Urgent', 'เร่งด่วน', '#ff0000'],
            [3, 'Not Urgent', 'ไม่รีบ', '#ff00ff'],
        ]);

        // Create the 'repair_status' table
        $this->createTable('{{%repair_status}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(45)->defaultValue(null)->comment('รหัส'),
            'name' => $this->string(100)->defaultValue(null)->comment('ชื่อ'),
            'color' => $this->string(45)->defaultValue(null)->comment('สี'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        // Insert data into the 'repair_status' table
        $this->batchInsert('{{%repair_status}}', ['id', 'code', 'name', 'color'], [
            [1, 'New Request', 'ใหม่', '#ff0000'],
            [2, 'In Progress', 'กำลังดำเนินการ', '#ff9900'],
            [3, 'Success', 'สำเร็จ', '#1A5D1A'],
            [4, 'Cancel', 'ยกเลิก', '#435B66'],
        ]);

        // Create the 'repair_type' table
        $this->createTable('{{%repair_type}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(45)->defaultValue(null)->comment('รหัส'),
            'name' => $this->string(100)->defaultValue(null)->comment('ชื่อ'),
            'color' => $this->string(45)->defaultValue(null)->comment('สี'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        // Insert data into the 'repair_type' table
        $this->batchInsert('{{%repair_type}}', ['id', 'code', 'name', 'color'], [
            [1, 'Project', 'งานโครงการ', '#0000ff'],
            [2, 'Repair', 'ซ่อมแซม', '#ffff00'],
            [3, 'New', 'สร้างใหม่', '#ff00ff'],
            [4, 'Adapt', 'ดัดแปลง', '#9900ff'],
            [5, 'Install', 'ติดตั้ง', '#3c78d8'],
            [6, 'Move', 'โยกย้าย', '#e69138'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the 'repair' table
        $this->dropTable('{{%repair}}');

        // Drop the 'repair_priority' table
        $this->dropTable('{{%repair_priority}}');

        // Drop the 'repair_status' table
        $this->dropTable('{{%repair_status}}');

        // Drop the 'repair_type' table
        $this->dropTable('{{%repair_type}}');
    }
}
