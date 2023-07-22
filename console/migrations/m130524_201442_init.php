<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'thai_name' => $this->string(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'verification_token' => $this->string()->defaultValue(null),
            'role' => $this->integer()->defaultValue(1),
            'status' => $this->smallInteger()->notNull()->defaultValue(9),
        ], $tableOptions);

        // Insert data into the 'user' table
        $this->batchInsert('{{%user}}', ['id', 'username', 'thai_name', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'created_at', 'updated_at', 'verification_token', 'role', 'status'], [
            [1, 'admin', 'ผู้ดูแลระบบ', '2tzscTHLNpS0rJlIJx_Uz1qZnvi6yS_q', '$2y$13$HwJ0Osagp4BHhcjKJMS.Su1kte.bpcDMCIusYWpu088FzQai9YqC6', NULL, 'admin@admin.com', 1689666356, 1689666356, 'SA3gozOob2BBbQR0Ue5t4mJQpoyb0gcp_1689666356', 10, 10],
            // [2, 'demo', 'ผู้ทดสอบระบบ', 'lJsMEFiO-XjqJrVhH2aDcjXyrP0oC0vy', '$2y$13$HwJ0Osagp4BHhcjKJMS.Su1kte.bpcDMCIusYWpu088FzQai9YqC6', NULL, 'demo@demo.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            // Add other rows here
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
