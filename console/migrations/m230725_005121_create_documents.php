<?php

use yii\db\Migration;

/**
 * Class m230725_005121_create_documents
 */
class m230725_005121_create_documents extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

        // Create the 'categories' table
        $this->createTable('{{%document_categories}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(255)->unique()->comment('รหัส'),
            'name' => $this->string(255)->defaultValue(null)->comment('ชื่อ'),
            'detail' => $this->text()->comment('รายละเอียด'),
            'color' => $this->string(255)->defaultValue(null)->comment('สี'),
        ],  $tableOptions);

        $this->batchInsert('{{%document_categories}}', ['id', 'code', 'name',  'detail', 'color'], [
            [1, 'General', 'เอกสารทั่วไป', '', '#0000ff'],
            [2, 'ISO', 'International Organization for Standardization', '', '#6527BE'],
            [3, 'COI', 'หนังสือรับรองสูตรส่วนประกอบ (Certificate of Ingredient)', '', '#F31559'],
            [4, 'COA', 'ใบรายงานผลการตรวจวิเคราะห์สินค้า Certificate of Analysis', '', '#090580'],
            [5, 'Fair Trade', 'Fair Trade', '', '#FD8D14'],
            [6, 'Manual', 'คู่มือ', '', '#CECE5A'],
            [7, 'Spec', 'Product Specification', '', '#FFE17B'],
            [8, 'Quotation', 'Quotation', '', '#91C8E4'],
            [9, 'Regulation', 'Regulation', '', '#749BC2'],
            [10, 'Reference', 'Reference', '', '#4682A9'],
            [11, 'Standard', 'Standard', '', '#FBA1B7'],
            [12, 'Data Sheet', 'Data Sheet', '', '#6C3428'],
           
        ]);

        // Create the 'status' table
        $this->createTable('{{%document_status}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(255)->unique()->comment('รหัส'),
            'name' => $this->string(255)->defaultValue(null)->comment('ชื่อ'),
            'detail' => $this->text()->comment('รายละเอียด'),
            'color' => $this->string(255)->defaultValue(null)->comment('สี'),
        ],  $tableOptions);

        $this->batchInsert('{{%document_status}}', ['id', 'code', 'name',  'detail', 'color'], [
            [1, 'Active', 'ใช้งาน', '', '#328906'],
            [2, 'Cancel', 'ยกเลิก', '', '#FE0000'],
            [3, 'Draft', 'ร่าง', '', '#3AA6B9'],
            [4, 'In Progress', 'ดำเนินการ', '', '#E7B10A'],
        ]);

        // Create the 'documents' table
        $this->createTable('{{%documents}}', [
            'id' => $this->primaryKey(),
            'numbers' => $this->string(255)->unique()->comment('รหัสเอกสาร'),
            'title' => $this->string(255)->defaultValue(null)->comment('ชื่อเอกสาร'),
            'description' => $this->text()->comment('รายละเอียด'),
            'expiration_date' => $this->date()->defaultValue(null)->comment('วันที่หมดอายุ'),
            'days_left' => $this->integer()->defaultValue(null)->comment('เตือนหมดอายุ (วัน)'),
            'created_at' => $this->datetime()->defaultValue(null)->comment('สร้างเมื่อ'),
            'updated_at' => $this->datetime()->defaultValue(null)->comment('ปรับปรุงเมื่อ'),
            'created_by' => $this->integer()->defaultValue(null)->comment('ผู้สร้าง'),
            'updated_by' => $this->integer()->defaultValue(null)->comment('ผู้ปรับปรุง'),
            'categories_id' => $this->integer()->defaultValue(null)->comment('หมวดหมู่'),
            'status_id' => $this->integer()->defaultValue(null)->comment('สถานะเอกสาร'),
            'ref' => $this->string(255)->comment('อ้างอิง'),
            'docs' => $this->text()->comment('ไฟล์เอกสาร'),
        ],  $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the 'categories' table
        $this->dropTable('{{%categories}}');

        // Drop the 'status' table
        $this->dropTable('{{%status}}');

        // Drop the 'status' table
        $this->dropTable('{{%documents}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230725_005121_create_documents cannot be reverted.\n";

        return false;
    }
    */
}
