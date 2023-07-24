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
            [2, 'demo', 'ผู้ทดสอบระบบ', 'lJsMEFiO-XjqJrVhH2aDcjXyrP0oC0vy', '$2y$13$HwJ0Osagp4BHhcjKJMS.Su1kte.bpcDMCIusYWpu088FzQai9YqC6', NULL, 'demo@demo.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 5, 10],
            [3, 'theerapong', 'ธีรพงศ์ ขันตา', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'theerapong@theerapong.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [4, 'onanong', 'อรอนงค์ ชุมภู', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'onanong@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [5, 'supanna', 'สุพรรณา พันธ์ภู่', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'supanna@email.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [6, 'peeranai', 'พีรนัย โสทรทวีพงศ์', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'peeranai@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 5, 10],
            [7, 'sawika', 'สาวิกา พินิจ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'sawika@email.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [8, 'araya', 'อารยา เทพโพธา', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'acc.nfcfa@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [9, 'kannika', 'กรรณิกา คำภีระ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'kannika@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [10, 'watsara', 'วรรษรา หลวงเป็ง', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'lee_lew@hotmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [11, 'yosaporn', 'ยศพร พยัคฆญาติ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'ypayakayat@yahoo.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [12, 'taweekiat', 'ทวีเกียรติ คำเทพ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'd.taweekiat@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [13, 'kullanitnaree', 'กุลนิษฐ์นรี เจริญจิตรวี', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'kullanitnaree@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [14, 'jiraporn', 'จิราภรณ์ กาบแก้ว', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'jiraporn@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [15, 'lapaeporn', 'ลภีพร กาบแก้ว', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'lapaeporn@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [16, 'ratsamee', 'รัศมี ศศิยศพงศ์', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'ratsamee@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [17, 'thaksin', 'ทักษิณ อินทรศิลา', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'notethaksin@hotmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [18, 'chadaporn', 'ชฎาภรณ์ แก้วคำ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'kaewkhamchadaporn@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [19, 'pranee', 'ปราณี แดงโคตร', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'pranee@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [20, 'premmika', 'เปรมมิกา พินิจ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'premmika2910@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [21, 'tanyarat', 'ธัญญารัตน์ นิ่มวงษ์', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'nimwong2539@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [22, 'charinee', 'ชาริณี จันต๊ะนาเขต', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'charinee@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [23, 'prakaiwan', 'ประกายวรรณ เทพมณี', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'prakaiwan4213@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [24, 'suriya', 'สุริยา สมเพชร', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'suriyasompatch@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [25, 'suphot', 'สุพจน์ ช่างฆ้อง', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'changkhong.8777@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [26, 'natthaphon', 'ณัฐพล ขันเขียว', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'natthaphon@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [27, 'sarawut', 'สราวุฒิ โฆษิตเกียรติคุณ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'en.nfc2016@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            [28, 'yosapon', 'ยศพนธ์ โพธิ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'yosapon@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10],
            // Add other rows here
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
