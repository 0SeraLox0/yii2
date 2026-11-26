<?php

declare(strict_types=1);

namespace app\models;

/**
 * Собирает данные из БД в формат MUSIC_DATA для фронтенда.
 */
class MusicDataHelper
{
    public static function getFrontendData(): array
    {
        $albums = Album::find()
            ->with(['genre', 'tracks', 'reviews'])
            ->orderBy(['rating' => SORT_DESC, 'id' => SORT_ASC])
            ->all();

        $genres = Genre::find()
            ->orderBy(['sort_order' => SORT_ASC, 'id' => SORT_ASC])
            ->all();

        $genreCounts = [];
        foreach ($albums as $album) {
            $gid = $album->genre_id;
            $genreCounts[$gid] = ($genreCounts[$gid] ?? 0) + 1;
        }

        $genresData = [
            [
                'id' => 'all',
                'name' => 'Все жанры',
                'count' => count($albums),
                'icon' => 'disc',
            ],
        ];
        foreach ($genres as $genre) {
            $genresData[] = [
                'id' => $genre->slug,
                'name' => $genre->name,
                'count' => $genreCounts[$genre->id] ?? 0,
                'icon' => $genre->icon,
                'color' => $genre->color,
            ];
        }

        $albumsData = [];
        $bestOfYear = [
            '2026' => [
                'year' => 2026,
                'headline' => 'Главные музыкальные открытия и релизы 2026 года',
                'subhead' => 'Ежегодный выбор музыкальных критиков и десятков тысяч пользователей MusikZone',
                'albums' => [],
            ],
            '2024' => [
                'year' => 2024,
                'headline' => 'Музыкальный калейдоскоп 2024 года',
                'subhead' => 'Год масштабных концептуальных возвращений и смелых жанровых экспериментов',
                'albums' => [],
            ],
            'all-time' => [
                'year' => 'All-Time',
                'headline' => 'Золотой пантеон: Лучшие альбомы всех времён',
                'subhead' => 'Фундаментальные пластинки, сформировавшие современную звуковую культуру',
                'albums' => [],
            ],
        ];

        foreach ($albums as $album) {
            $tracksData = [];
            foreach ($album->tracks as $track) {
                $tracksData[] = [
                    'number' => $track->number,
                    'title' => $track->title,
                    'duration' => $track->duration,
                    'plays' => $track->plays,
                    'isHit' => (bool)$track->is_hit,
                ];
            }

            $reviewsData = [];
            foreach ($album->reviews as $review) {
                $reviewsData[] = [
                    'id' => 'rev-' . $review->id,
                    'author' => $review->author_name,
                    'avatar' => $review->author_avatar,
                    'role' => $review->author_role,
                    'rating' => $review->rating,
                    'date' => $review->date_label,
                    'title' => $review->title,
                    'text' => $review->text,
                    'pros' => $review->getProsArray(),
                    'cons' => $review->getConsArray(),
                    'likes' => $review->likes,
                ];
            }

            $albumsData[] = [
                'id' => $album->slug,
                'title' => $album->title,
                'artist' => $album->artist,
                'year' => $album->year,
                'releaseDate' => $album->release_date,
                'genre' => $album->genre->name ?? 'Музыка',
                'subgenres' => $album->getSubgenresArray(),
                'label' => $album->label,
                'duration' => $album->duration,
                'trackCount' => count($tracksData) ?: $album->track_count,
                'rating' => (float)$album->rating,
                'criticsScore' => $album->critics_score,
                'userScore' => (float)$album->user_score,
                'ratingsCount' => $album->ratings_count,
                'coverImage' => $album->cover_image,
                'badge' => $album->badge,
                'description' => $album->description,
                'tracks' => $tracksData,
                'reviews' => $reviewsData,
            ];

            if ($album->best_year_key && isset($bestOfYear[$album->best_year_key])) {
                $bestOfYear[$album->best_year_key]['albums'][] = [
                    'rank' => $album->best_year_rank ?? 99,
                    'albumId' => $album->slug,
                    'badge' => $album->best_year_badge ?: ($album->badge ?: 'Выбор MusikZone'),
                    'nomination' => $album->genre->name ?? '',
                    'reason' => $album->best_year_reason ?: $album->description,
                ];
            }
        }

        foreach ($bestOfYear as $key => $group) {
            usort($bestOfYear[$key]['albums'], static fn(array $a, array $b): int => $a['rank'] <=> $b['rank']);
        }

        return [
            'genres' => $genresData,
            'albums' => $albumsData,
            'bestOfYearRankings' => $bestOfYear,
        ];
    }
}
