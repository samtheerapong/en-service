<?php

use yii\db\Migration;

/**
 * Class m230722_074556_create_user_auth
 */
class m230722_074556_create_user_auth extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci';

        // Table structure for `auth_assignment`
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(64)->notNull()->collate('utf8_unicode_ci'),
            'user_id' => $this->string(64)->notNull()->collate('utf8_unicode_ci'),
            'created_at' => $this->integer(11)->defaultValue(null),
        ], $tableOptions);

        $this->addPrimaryKey('pk-auth_assignment', '{{%auth_assignment}}', ['item_name', 'user_id']);

        // Table structure for `auth_item`
        $this->createTable('{{%auth_item}}', [
            'name' => $this->string(64)->notNull()->collate('utf8_unicode_ci'),
            'type' => $this->smallInteger(6)->notNull(),
            'description' => $this->text()->collate('utf8_unicode_ci'),
            'rule_name' => $this->string(64)->defaultValue(null)->collate('utf8_unicode_ci'),
            'data' => $this->binary(),
            'created_at' => $this->integer(11)->defaultValue(null),
            'updated_at' => $this->integer(11)->defaultValue(null),
        ], $tableOptions);

        $this->addPrimaryKey('pk-auth_item', '{{%auth_item}}', 'name');

        // Insert data into `auth_item`
        $this->insert('{{%auth_item}}', [
            'name' => 'Admin',
            'type' => 1,
            'created_at' => 1689998486,
            'updated_at' => 1689998486,
        ]);

        // Table structure for `auth_item_child`
        $this->createTable('{{%auth_item_child}}', [
            'parent' => $this->string(64)->notNull()->collate('utf8_unicode_ci'),
            'child' => $this->string(64)->notNull()->collate('utf8_unicode_ci'),
        ], $tableOptions);

        $this->addPrimaryKey('pk-auth_item_child', '{{%auth_item_child}}', ['parent', 'child']);

        // Table structure for `auth_rule`
        $this->createTable('{{%auth_rule}}', [
            'name' => $this->string(64)->notNull()->collate('utf8_unicode_ci'),
            'data' => $this->binary(),
            'created_at' => $this->integer(11)->defaultValue(null),
            'updated_at' => $this->integer(11)->defaultValue(null),
        ], $tableOptions);

        $this->addPrimaryKey('pk-auth_rule', '{{%auth_rule}}', 'name');

        // Table structure for `user`
        $this->createTable('{{%user}}', [
            'id' => $this->integer(11)->notNull(),
            'username' => $this->string(255)->notNull()->collate('utf8_unicode_ci'),
            'thai_name' => $this->string(255)->defaultValue(null)->collate('utf8_unicode_ci')->comment('ชื่อ-สกุล'),
            'auth_key' => $this->string(32)->notNull()->collate('utf8_unicode_ci'),
            'password_hash' => $this->string(255)->notNull()->collate('utf8_unicode_ci'),
            'password_reset_token' => $this->string(255)->defaultValue(null)->collate('utf8_unicode_ci'),
            'email' => $this->string(255)->notNull()->collate('utf8_unicode_ci'),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'verification_token' => $this->string(255)->defaultValue(null)->collate('utf8_unicode_ci'),
            'role' => $this->smallInteger(6)->notNull()->defaultValue(1),
            'status' => $this->smallInteger(6)->notNull()->defaultValue(10),
        ], $tableOptions);

        $this->addPrimaryKey('pk-user', '{{%user}}', 'id');
        $this->createIndex('idx-user-username', '{{%user}}', 'username', true);
        $this->createIndex('idx-user-email', '{{%user}}', 'email', true);
        $this->createIndex('idx-user-password_reset_token', '{{%user}}', 'password_reset_token', true);
        $this->alterColumn('{{%user}}', 'id', $this->integer(11) . ' NOT NULL AUTO_INCREMENT');

        // Insert data into `user`
        $this->batchInsert('{{%user}}', ['id', 'username', 'thai_name', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'created_at', 'updated_at', 'verification_token', 'role', 'status'], [
            [1, 'admin', 'ผู้ดูแลระบบ', '2tzscTHLNpS0rJlIJx_Uz1qZnvi6yS_q', '$2y$13$HwJ0Osagp4BHhcjKJMS.Su1kte.bpcDMCIusYWpu088FzQai9YqC6', NULL, 'admin@admin.com', 1689666356, 1689666356, 'SA3gozOob2BBbQR0Ue5t4mJQpoyb0gcp_1689666356', 10, 10],
            [2, 'demo', 'ผู้ทดสอบระบบ', 'lJsMEFiO-XjqJrVhH2aDcjXyrP0oC0vy', '$2y$13$9cR6h5aFzqkDiaIYP4DQYuywLj.cgAyUBuIexfQNZCqaJQ.T/Zxfi', NULL, 'demo@demo.com', 1689756005, 1689756005, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [3, 'onanong', 'อรอนงค์ ชมภู', 'lJsMEFiO-XjqJrVhH2aDcjXyrP0oC0vy', '$2y$13$9cR6h5aFzqkDiaIYP4DQYuywLj.cgAyUBuIexfQNZCqaJQ.T/Zxfi', NULL, 'demo@demo.com', 1689756005, 1689756005, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [4, 'supanna', 'สุพรรณา พันธ์ภู่', 'yJwBMulOJv3IDmDkCXrdYZ-VMEw_zwLZ', '$2y$13$O4m3JByeXwarBQx8Na5aXuqT8v0WqaRJakqletAVt/p8XffgPvcau', NULL, 'supanna@nfc.com', 1689759339, 1689759339, '4Zgy1uVGJvXg2nZOAHcFCSj0NK0Ll3Ze_1689759339', 5, 10],
            [5, 'prakaiwan', 'ประกายวรรณ เทพมณี', 'y2RYhV3E1NG68CUaa8svzBknRdbCTO79', '$2y$13$GkUZhR.dM5CJdm9MCnTYp.Ij9eya2sBVX.9CaRP/nlJq92WAQ7y02', NULL, 'prakaiwan@nfc.com', 1689759362, 1689759362, '2qNZk71gb01_K-bdCiscD38z36G9exZH_1689759362', 1, 10],
            [6, 'sale', 'ฝ่ายขาย', 'EHSvx6uElywR8fG2XRQ_xKE4sups-8cO', '$2y$13$fOXl5gCyOYl4NxlvgBJ85O7wQvWcVNYnzg4IGDNkIkX6hl2d7aMbO', NULL, 'sale@nfc.com', 1689759388, 1689759388, '9ZnxmSRzPpvLgxD0MPSamdokpcp_eMul_1689759388', 1, 10],
            [7, 'planning', 'ฝ่ายวางแผน', 'JWT4BgIkYF4TIN62mLaKv5iL0uLMn7C9', '$2y$13$g08zQ7xjXISzs99kS2yApuOCRcV6QpMOfdzNAwYY8fP9N96pEuAye', NULL, 'planning@nfc.com', 1689759413, 1689759413, '7xCjBXE9xNLx1gWqKX2LaVex2ah0IWt4_1689759413', 1, 9],
            [8, 'production', 'ฝ่ายผลิต', 'FjE8vrSWJ1uVTanpvQJDnpq_OiUySrzg', '$2y$13$Oa3U4rEqDwN8W0ytkDHCjuPw8CW4d44l9tEWbi3N3myBogr4mmzBy', NULL, 'production@nfc.com', 1689759430, 1689759430, 'qNJ-e9RkWlfqvHqmvmSsItU1rlpb_D3j_1689759430', 5, 9],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%auth_item_child}}');
        $this->dropTable('{{%auth_item}}');
        $this->dropTable('{{%auth_assignment}}');
        $this->dropTable('{{%auth_rule}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230722_074556_create_user_auth cannot be reverted.\n";

        return false;
    }
    */
}
