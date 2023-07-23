<?php

use yii\db\Migration;

/**
 * Class m230723_151219_create_repair_team
 */
class m230723_151219_create_repair_team extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

        $this->createTable('{{%repair_team}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(45)->unique()->comment('รหัส'),
            'name' => $this->string(100)->defaultValue(null)->comment('ชื่อ'),
            'color' => $this->string(45)->defaultValue(null)->comment('สี'),
        ],  $tableOptions);

        // Insert data into the 'repair_priority' table
        $this->batchInsert('{{%repair_team}}', ['id', 'code', 'name', 'color'], [
            [1, 'EN', 'วิศวกรรม', '#9900ff'],
            [2, 'IT', 'เทคโนโลยีสารสนเทศ', '#1D5D9B'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%repair_team}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230723_151219_create_repair_team cannot be reverted.\n";

        return false;
    }
    */
}
