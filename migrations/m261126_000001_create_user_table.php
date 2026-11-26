<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Создаёт таблицу пользователей и аккаунтов.
 */
class m261126_000001_create_user_table extends Migration
{
    public function safeUp(): void
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(64)->notNull()->unique(),
            'email' => $this->string(128)->notNull()->unique(),
            'display_name' => $this->string(128)->notNull(),
            'role' => $this->string(32)->notNull()->defaultValue('user'),
            'avatar' => $this->string(512)->notNull()->defaultValue('https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80'),
            'password_hash' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function safeDown(): void
    {
        $this->dropTable('{{%user}}');
    }
}
