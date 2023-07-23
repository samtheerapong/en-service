<?php

use yii\db\Migration;

/**
 * Class m230723_143557_create_department
 */
class m230723_143557_create_department extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

        $this->createTable('{{%department}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(45)->unique()->comment('รหัส'),
            'name' => $this->string(100)->defaultValue(null)->comment('ชื่อ'),
            'color' => $this->string(45)->defaultValue(null)->comment('สี'),
        ],  $tableOptions);

        // Insert data into the 'repair_priority' table
        $this->batchInsert('{{%department}}', ['id', 'code', 'name', 'color'], [
            [1, 'AC', 'บัญชี', '#6aa84f'],
            [2, 'EN', 'แผนกวิศวกรรม', '#9900ff'],
            [3, 'GM', 'ผู้จัดการ', '#ff00ff'],
            [4, 'MK', 'การตลาด', '#434343'],
            [5, 'PD', 'ฝ่ายผลิต', '#071952'],
            [6, 'QC', 'แผนกควบคุมคุณภาพ', '#ff9900'],
            [7, 'PC', 'แผนกจัดซื้อ', '#ff00ff'],
            [8, 'WH', 'แผนกคลังสินค้า', '#980000'],
            [9, 'RD', 'แผนกวิจัยและพัฒนาผลิตภัณฑ์', '#ff0000'],
            [10, 'PN', 'ฝ่ายวางแผนและควบคุมการผลิต', '#674ea7'],
            [11, 'IT', 'แผนกเทคโนโลยีสารสนเทศ', '#1D5D9B'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%department}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230723_143557_create_department cannot be reverted.\n";

        return false;
    }
    */
}
