<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Заполняет БД начальными пользователями и каталогом из seed_data.json.
 */
class m261126_000003_seed_initial_data extends Migration
{
    public function safeUp(): void
    {
        $now = time();
        $security = Yii::$app->security;

        // 1. Пользователи (администратор и обычный пользователь)
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'email' => 'admin@musikzone.local',
            'display_name' => 'Администратор MusikZone',
            'role' => 'admin',
            'avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80',
            'password_hash' => $security->generatePasswordHash('admin123'),
            'auth_key' => $security->generateRandomString(32),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $this->insert('{{%user}}', [
            'username' => 'demo',
            'email' => 'demo@musikzone.local',
            'display_name' => 'Артем Соколов',
            'role' => 'user',
            'avatar' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80',
            'password_hash' => $security->generatePasswordHash('demo123'),
            'auth_key' => $security->generateRandomString(32),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // 2. Жанры, альбомы, треки и рецензии
        $seedPath = __DIR__ . '/seed_data.json';
        $data = json_decode((string)file_get_contents($seedPath), true);
        if (!is_array($data)) {
            throw new \RuntimeException('Failed to decode seed_data.json');
        }

        $genreIdByName = [];
        $sortOrder = 0;
        foreach ($data['genres'] as $genre) {
            if (($genre['id'] ?? '') === 'all') {
                continue;
            }
            $this->insert('{{%genre}}', [
                'slug' => (string)$genre['id'],
                'name' => (string)$genre['name'],
                'icon' => (string)($genre['icon'] ?? 'disc'),
                'color' => (string)($genre['color'] ?? '#6366F1'),
                'sort_order' => $sortOrder++,
            ]);
            $genreIdByName[$genre['name']] = (int)$this->db->getLastInsertID();
        }

        // Карта подборок «Лучшее за год» по album slug (берем первую встреченную, либо сохраняем в таблице)
        $bestMap = [];
        if (!empty($data['bestOfYearRankings']) && is_array($data['bestOfYearRankings'])) {
            foreach ($data['bestOfYearRankings'] as $yearKey => $ranking) {
                foreach ($ranking['albums'] ?? [] as $item) {
                    $slug = $item['albumId'] ?? '';
                    if ($slug !== '' && !isset($bestMap[$slug])) {
                        $bestMap[$slug] = [
                            'key' => (string)$yearKey,
                            'rank' => (int)($item['rank'] ?? 1),
                            'badge' => (string)($item['badge'] ?? ''),
                            'reason' => (string)($item['reason'] ?? ''),
                        ];
                    }
                }
            }
        }

        foreach ($data['albums'] as $album) {
            $genreName = (string)($album['genre'] ?? '');
            $genreId = $genreIdByName[$genreName] ?? reset($genreIdByName);
            $slug = (string)$album['id'];
            $best = $bestMap[$slug] ?? null;

            $this->insert('{{%album}}', [
                'slug' => $slug,
                'title' => (string)$album['title'],
                'artist' => (string)$album['artist'],
                'year' => (int)$album['year'],
                'release_date' => (string)($album['releaseDate'] ?? ''),
                'genre_id' => $genreId,
                'subgenres_json' => json_encode($album['subgenres'] ?? [], JSON_UNESCAPED_UNICODE),
                'label' => (string)($album['label'] ?? ''),
                'duration' => (string)($album['duration'] ?? ''),
                'track_count' => (int)($album['trackCount'] ?? count($album['tracks'] ?? [])),
                'rating' => (float)($album['rating'] ?? 0),
                'critics_score' => (int)($album['criticsScore'] ?? 0),
                'user_score' => (float)($album['userScore'] ?? 0),
                'ratings_count' => (int)($album['ratingsCount'] ?? 0),
                'cover_image' => (string)($album['coverImage'] ?? ''),
                'badge' => (string)($album['badge'] ?? ''),
                'best_year_key' => $best['key'] ?? null,
                'best_year_rank' => $best['rank'] ?? null,
                'best_year_badge' => $best['badge'] ?? null,
                'best_year_reason' => $best['reason'] ?? null,
                'description' => (string)($album['description'] ?? ''),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $albumId = (int)$this->db->getLastInsertID();

            foreach ($album['tracks'] ?? [] as $track) {
                $this->insert('{{%track}}', [
                    'album_id' => $albumId,
                    'number' => (int)$track['number'],
                    'title' => (string)$track['title'],
                    'duration' => (string)($track['duration'] ?? '3:30'),
                    'plays' => (string)($track['plays'] ?? '1M'),
                    'is_hit' => !empty($track['isHit']) ? 1 : 0,
                ]);
            }

            foreach ($album['reviews'] ?? [] as $review) {
                $this->insert('{{%review}}', [
                    'album_id' => $albumId,
                    'user_id' => null,
                    'author_name' => (string)$review['author'],
                    'author_avatar' => (string)($review['avatar'] ?? 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80'),
                    'author_role' => (string)($review['role'] ?? 'Слушатель (MusikZone)'),
                    'rating' => (int)$review['rating'],
                    'date_label' => (string)($review['date'] ?? 'Только что'),
                    'title' => (string)$review['title'],
                    'text' => (string)$review['text'],
                    'pros_json' => json_encode($review['pros'] ?? [], JSON_UNESCAPED_UNICODE),
                    'cons_json' => json_encode($review['cons'] ?? [], JSON_UNESCAPED_UNICODE),
                    'likes' => (int)($review['likes'] ?? 0),
                    'status' => 'published',
                    'created_at' => $now,
                ]);
            }
        }
    }

    public function safeDown(): void
    {
        $this->delete('{{%review}}');
        $this->delete('{{%track}}');
        $this->delete('{{%album}}');
        $this->delete('{{%genre}}');
        $this->delete('{{%user}}');
    }
}
