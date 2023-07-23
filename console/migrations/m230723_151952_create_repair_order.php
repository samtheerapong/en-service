<?php

use yii\db\Migration;

/**
 * Class m230723_151952_create_repair_man
 */
class m230723_151952_create_repair_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%repair_order}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->defaultValue(null)->comment('ใบแจ้งซ่อม'),
            'ticket_number' => $this->string(100)->defaultValue(null)->comment('เลขที่ใบแจ้งซ่อม'),
            'technician_team' => $this->string()->defaultValue(null)->comment('ทีมช่าง'),
            'repair_start' => $this->datetime()->defaultValue(null)->comment('วันที่เริ่มซ่อม'),
            'repair_end' => $this->datetime()->defaultValue(null)->comment('วันที่ซ่อมเสร็จ'),
            'repair_type_id' => $this->integer()->defaultValue(null)->comment('ประเภทการซ่อม'),
            'spare_part' => $this->text()->comment('รายการอะไหล่'),
            'cost' => $this->float()->defaultValue(0)->comment('ค่าใช้จ่าย'),
            'files' => $this->text()->comment('ไฟล์แนบ'),
            'comment' => $this->text()->comment('ความคิดเห็น'),
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%repair_order}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230723_151952_create_repair_man cannot be reverted.\n";

        return false;
    }
    */
}
