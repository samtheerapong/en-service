<?php

use yii\db\Migration;

/**
 * Class m230722_064145_create_auth
 */
class m230722_064145_create_auth extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // Create the 'auth_assignment' table
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->string(64)->notNull(),
            'created_at' => $this->integer(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_auth_assignment', '{{%auth_assignment}}', ['item_name', 'user_id']);

        // Create the 'auth_item' table
        $this->createTable('{{%auth_item}}', [
            'name' => $this->string(64)->notNull(),
            'type' => $this->smallInteger(6)->notNull(),
            'description' => $this->text(),
            'rule_name' => $this->string(64),
            'data' => $this->binary(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_auth_item', '{{%auth_item}}', 'name');

        // Create the 'auth_item_child' table
        $this->createTable('{{%auth_item_child}}', [
            'parent' => $this->string(64)->notNull(),
            'child' => $this->string(64)->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_auth_item_child', '{{%auth_item_child}}', ['parent', 'child']);

        // Create the 'auth_rule' table
        $this->createTable('{{%auth_rule}}', [
            'name' => $this->string(64)->notNull(),
            'data' => $this->binary(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_auth_rule', '{{%auth_rule}}', 'name');

        // Insert data into the 'auth_item' table
        $this->batchInsert('{{%auth_item}}', ['name', 'type', 'description', 'rule_name', 'data', 'created_at', 'updated_at'], [
            ['Admin', 1, null, null, null, 1689998486, 1689998486],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // Delete data from the 'auth_item' table
        // $this->delete('{{%auth_item}}', ['name' => 'Admin']);
        $this->delete('{{%auth_item}}');

        // Drop the 'auth_assignment' table
        $this->dropTable('{{%auth_assignment}}');

        // Drop the 'auth_item_child' table
        $this->dropTable('{{%auth_item_child}}');

        // Drop the 'auth_rule' table
        $this->dropTable('{{%auth_rule}}');

        // Drop the 'auth_item' table
        $this->dropTable('{{%auth_item}}');
    }
}
