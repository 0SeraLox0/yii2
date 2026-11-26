<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Создаёт таблицы музыкального каталога: genre, album, track, review.
 */
class m261126_000002_create_music_tables extends Migration
{
    public function safeUp(): void
    {
        $this->createTable('{{%genre}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(64)->notNull()->unique(),
            'name' => $this->string(128)->notNull(),
            'icon' => $this->string(64)->notNull()->defaultValue('disc'),
            'color' => $this->string(32)->notNull()->defaultValue('#6366F1'),
            'sort_order' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('{{%album}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(128)->notNull()->unique(),
            'title' => $this->string(255)->notNull(),
            'artist' => $this->string(255)->notNull(),
            'year' => $this->integer()->notNull(),
            'release_date' => $this->string(64)->notNull()->defaultValue(''),
            'genre_id' => $this->integer()->notNull(),
            'subgenres_json' => $this->text()->notNull()->defaultValue('[]'),
            'label' => $this->string(128)->notNull()->defaultValue(''),
            'duration' => $this->string(32)->notNull()->defaultValue(''),
            'track_count' => $this->integer()->notNull()->defaultValue(0),
            'rating' => $this->float()->notNull()->defaultValue(0),
            'critics_score' => $this->integer()->notNull()->defaultValue(0),
            'user_score' => $this->float()->notNull()->defaultValue(0),
            'ratings_count' => $this->integer()->notNull()->defaultValue(0),
            'cover_image' => $this->string(512)->notNull()->defaultValue(''),
            'badge' => $this->string(128)->notNull()->defaultValue(''),
            'best_year_key' => $this->string(32)->null(),
            'best_year_rank' => $this->integer()->null(),
            'best_year_badge' => $this->string(128)->null(),
            'best_year_reason' => $this->text()->null(),
            'description' => $this->text()->notNull()->defaultValue(''),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'FOREIGN KEY ([[genre_id]]) REFERENCES {{%genre}} ([[id]]) ON DELETE RESTRICT ON UPDATE CASCADE',
        ]);

        $this->createTable('{{%track}}', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer()->notNull(),
            'number' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'duration' => $this->string(32)->notNull()->defaultValue('3:30'),
            'plays' => $this->string(32)->notNull()->defaultValue('1M'),
            'is_hit' => $this->boolean()->notNull()->defaultValue(false),
            'FOREIGN KEY ([[album_id]]) REFERENCES {{%album}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ]);

        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->null(),
            'author_name' => $this->string(128)->notNull(),
            'author_avatar' => $this->string(512)->notNull()->defaultValue('https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80'),
            'author_role' => $this->string(128)->notNull()->defaultValue('Слушатель (MusikZone)'),
            'rating' => $this->integer()->notNull(),
            'date_label' => $this->string(64)->notNull()->defaultValue('Только что'),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'pros_json' => $this->text()->notNull()->defaultValue('[]'),
            'cons_json' => $this->text()->notNull()->defaultValue('[]'),
            'likes' => $this->integer()->notNull()->defaultValue(0),
            'status' => $this->string(32)->notNull()->defaultValue('published'),
            'created_at' => $this->integer()->notNull(),
            'FOREIGN KEY ([[album_id]]) REFERENCES {{%album}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[user_id]]) REFERENCES {{%user}} ([[id]]) ON DELETE SET NULL ON UPDATE CASCADE',
        ]);
    }

    public function safeDown(): void
    {
        $this->dropTable('{{%review}}');
        $this->dropTable('{{%track}}');
        $this->dropTable('{{%album}}');
        $this->dropTable('{{%genre}}');
    }
}
