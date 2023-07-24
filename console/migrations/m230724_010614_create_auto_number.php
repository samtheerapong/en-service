<?php

use yii\db\Migration;

/**
 * Class m230724_010614_create_auto_number
 */
class m230724_010614_create_auto_number extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

        $this->createTable('{{%auto_number}}', [
            'group' => $this->string(32)->notNull(),
            'number' => $this->integer(11),
            'optimistic_lock' => $this->integer(11),
            'update_time' => $this->integer(11),
        ], $tableOptions);

        $this->addPrimaryKey('pk_auto_number', '{{%auto_number}}', 'group');

        // Insert data into the 'auto_number' table
        $this->insert('{{%auto_number}}', [
            'group' => 'RP202307-???',
            'number' => 2,
            'optimistic_lock' => 1,
            'update_time' => 1689950140,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the 'auto_number' table
        $this->dropTable('{{%auto_number}}');
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230724_010614_create_auto_number cannot be reverted.\n";

        return false;
    }
    */
}
