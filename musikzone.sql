-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 26 2026 г., 01:11
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `musikzone`
--

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `release_date` varchar(64) NOT NULL DEFAULT '',
  `genre_id` int(11) NOT NULL,
  `subgenres_json` text NOT NULL DEFAULT '[]',
  `label` varchar(128) NOT NULL DEFAULT '',
  `duration` varchar(32) NOT NULL DEFAULT '',
  `track_count` int(11) NOT NULL DEFAULT 0,
  `rating` float NOT NULL DEFAULT 0,
  `critics_score` int(11) NOT NULL DEFAULT 0,
  `user_score` float NOT NULL DEFAULT 0,
  `ratings_count` int(11) NOT NULL DEFAULT 0,
  `cover_image` varchar(512) NOT NULL DEFAULT '',
  `badge` varchar(128) NOT NULL DEFAULT '',
  `best_year_key` varchar(32) DEFAULT NULL,
  `best_year_rank` int(11) DEFAULT NULL,
  `best_year_badge` varchar(128) DEFAULT NULL,
  `best_year_reason` text DEFAULT NULL,
  `description` text NOT NULL DEFAULT '',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `album`
--

INSERT INTO `album` (`id`, `slug`, `title`, `artist`, `year`, `release_date`, `genre_id`, `subgenres_json`, `label`, `duration`, `track_count`, `rating`, `critics_score`, `user_score`, `ratings_count`, `cover_image`, `badge`, `best_year_key`, `best_year_rank`, `best_year_badge`, `best_year_reason`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ram-daftpunk', 'Random Access Memories', 'Daft Punk', 2013, '17 мая 2013', 1, '[\"Disco\",\"Funk\",\"Synthpop\",\"French House\"]', 'Columbia Records', '74:24', 13, 9.6, 97, 9.5, 3840, 'https://images.unsplash.com/photo-1614613535308-eb5fbd3d2c17?w=600&auto=format&fit=crop&q=80', 'Выбор редакции', '2026', 3, 'Переиздание года', 'Специальное юбилейное ремастеринг-издание с неизданными сессиями Moroder.', 'Четвертый и финальный студийный альбом легендарного французского дуэта Daft Punk. Дань уважения музыке конца 70-х и начала 80-х годов с живыми инструментами, оркестровыми аранжировками и участием Джорджо Мородера, Найла Роджерса и Фаррелла Уильямса. Настоящий шедевр аналогового продакшена XXI века.', 1795651761, 1795651761),
(2, 'ok-computer-radiohead', 'OK Computer', 'Radiohead', 1997, '21 мая 1997', 2, '[\"Alternative Rock\",\"Art Rock\",\"Post-Rock\"]', 'Parlophone / Capitol', '53:21', 12, 9.8, 99, 9.8, 5210, 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=600&auto=format&fit=crop&q=80', 'Золотая классика', 'all-time', 2, 'Веха 90-х #2', 'Пластинка, предсказавшая цифровое одиночество XXI века.', 'Определяющий рок-альбом конца 90-х годов. Том Йорк и музыканты Radiohead исследовали отчуждение, страх перед надвигающейся цифровизацией общества и потребительским хаосом. Плотные гитарные стены сменяются хрупкими электронными текстурами.', 1795651761, 1795651761),
(3, 'tpab-kendrick', 'To Pimp a Butterfly', 'Kendrick Lamar', 2015, '15 марта 2015', 3, '[\"Conscious Hip-Hop\",\"Jazz Rap\",\"Funk\",\"Neo-Soul\"]', 'Top Dawg / Aftermath / Interscope', '78:51', 16, 9.7, 98, 9.7, 4620, 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=600&auto=format&fit=crop&q=80', 'Шедевр десятилетия', 'all-time', 4, 'Триумф века #4', 'Синтез афроамериканской культуры в бескомпромиссном звуке.', 'Монументальный магнум опус Кендрика Ламара, объединивший афроамериканскую музыкальную традицию — джаз, фанк, спокен-ворд и классический хип-хоп Западного побережья с виртуозной продюсерской работой Flying Lotus, Thundercat и Kamasi Washington.', 1795651761, 1795651761),
(4, 'dark-side-pink-floyd', 'The Dark Side of the Moon', 'Pink Floyd', 1973, '1 марта 1973', 2, '[\"Progressive Rock\",\"Psychedelic Rock\",\"Art Rock\"]', 'Harvest / EMI', '42:50', 10, 9.9, 100, 9.8, 7890, 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=600&auto=format&fit=crop&q=80', 'Легенда всех времён', 'all-time', 1, 'Безусловный шедевр #1', 'Эталон аудиофилии и философской мысли в рок-музыке.', 'Один из самых продаваемых и влиятельных альбомов в истории человечества. Темы безумия, быстротечности времени, алчности и смерти, сплетенные звукоинженером Аланом Парсонсом в непрерывное звуковое полотно с использованием инновационных синтезаторов EMS VCS 3.', 1795651761, 1795651761),
(5, 'hit-me-hard-billie', 'HIT ME HARD AND SOFT', 'Billie Eilish', 2024, '17 мая 2024', 6, '[\"Alt-Pop\",\"Chamber Pop\",\"Electronica\"]', 'Darkroom / Interscope', '43:45', 10, 9.3, 92, 9.4, 2950, 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=600&auto=format&fit=crop&q=80', 'Топ 2024 года', '2026', 1, 'Альбом года 2026', 'Утонченная звуковая архитектура, где тишина и динамические взрывы создают новый стандарт поп-музыки.', 'Третий альбом Билли Айлиш и Финнеаса, получивший единодушное признание за смелые звуковые контрасты: от интимного шёпота укулеле до грандиозных оркестровых дропов и синти-диско ритмов в треках вроде «L\'AMOUR DE MA VIE» и «CHIHIRO».', 1795651761, 1795651761),
(6, 'kind-of-blue-miles', 'Kind of Blue', 'Miles Davis', 1959, '17 августа 1959', 4, '[\"Modal Jazz\",\"Cool Jazz\",\"Hard Bop\"]', 'Columbia Records', '45:33', 5, 9.8, 100, 9.7, 3100, 'https://images.unsplash.com/photo-1511192336575-5a79af67a629?w=600&auto=format&fit=crop&q=80', 'Золотая классика', 'all-time', 3, 'Джазовая вершина #3', 'Альбом, после которого мир музыки уже не мог остаться прежним.', 'Священный грааль модального джаза. Записанный за две сессии секстетом в составе Майлза Дэвиса, Джона Колтрейна, Билла Эванса, Кэннонбола Эддерли, Пола Чемберса и Джимми Кобба. Музыка свободного дыхания и чистой импровизации.', 1795651761, 1795651761),
(7, 'currents-tame-impala', 'Currents', 'Tame Impala', 2015, '17 июля 2015', 2, '[\"Psychedelic Pop\",\"Synthpop\",\"Disco\",\"Neo-Psychedelia\"]', 'Modular / Interscope', '51:12', 13, 9.3, 90, 9.4, 4120, 'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?w=600&auto=format&fit=crop&q=80', 'Топ выбор', NULL, NULL, NULL, NULL, 'Кевин Паркер в одиночку создал триумфальный синтезаторно-психоделический манифест о расставании и внутренней трансформации. Басовые риффы «The Less I Know the Better» стали одним из самых узнаваемых гимнов поколения.', 1795651761, 1795651761),
(8, 'chromakopia-tyler', 'CHROMAKOPIA', 'Tyler, the Creator', 2024, '28 октября 2024', 3, '[\"Experimental Hip-Hop\",\"Neo Soul\",\"Jazz Fusion\"]', 'Columbia Records', '52:58', 14, 9.4, 93, 9.5, 3140, 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&auto=format&fit=crop&q=80', 'Топ 2024 года', '2026', 2, 'Выбор критиков', 'Мощнейшая исповедь поколения, стирающая грань между джазом, рэпом и оперой.', 'Глубоко интимный, театральный и зрелый альбом Тайлера, в котором он исследует страх старения, отцовство, паранойю славы и моногамию через альтер-эго St. Chroma. Плотные военные марши соединяются с роскошными соул-гармониями.', 1795651761, 1795651761),
(9, 'saw-aphex-twin', 'Selected Ambient Works 85-92', 'Aphex Twin', 1992, '12 февраля 1992', 5, '[\"Ambient Techno\",\"IDM\",\"Acid House\"]', 'Apollo / R&S Records', '74:40', 13, 9.6, 98, 9.6, 2890, 'https://images.unsplash.com/photo-1518609878373-06d740f60d8b?w=600&auto=format&fit=crop&q=80', 'Веха жанра', NULL, NULL, NULL, NULL, 'Краеугольный камень интеллектуальной танцевальной музыки (IDM) и эмбиент-техно. Ричард Д. Джеймс записал эти мерцающие, теплые и медитативные композиции на самодельном оборудовании и кассетах в подростковом возрасте в Корнуолле.', 1795651761, 1795651761),
(10, 'mezzanine-massive-attack', 'Mezzanine', 'Massive Attack', 1998, '20 апреля 1998', 1, '[\"Trip-Hop\",\"Dark Wave\",\"Post-Punk\",\"Dub\"]', 'Circa / Virgin', '63:29', 11, 9.5, 97, 9.6, 3410, 'https://images.unsplash.com/photo-1511735111819-9a3f7709049c?w=600&auto=format&fit=crop&q=80', 'Золотая классика', NULL, NULL, NULL, NULL, 'Мрачный, тяжелый, чувственный трип-хоп с перегруженными дисторшн-гитарами и гипнотическим вокалом Элизабет Фрейзер (Cocteau Twins). Трек «Teardrop» стал символом эпохи и эталоном атмосферного продакшена.', 1795651761, 1795651761),
(11, 'after-hours-weeknd', 'After Hours', 'The Weeknd', 2020, '20 марта 2020', 6, '[\"Synthwave\",\"R&B\",\"Electropop\",\"New Wave\"]', 'XO / Republic', '56:19', 14, 9.2, 89, 9.3, 5400, 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=600&auto=format&fit=crop&q=80', 'Мировой блокбастер', NULL, NULL, NULL, NULL, 'Кинематографичный нео-нуарный шедевр The Weeknd в сотрудничестве с Максом Мартином и Oneohtrix Point Never. Сингл «Blinding Lights» побил исторические рекорды чарта Billboard Hot 100, а сам альбом возродил эстетику ретровейва 80-х в глобальном масштабе.', 1795651761, 1795651761);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `icon` varchar(64) NOT NULL DEFAULT 'disc',
  `color` varchar(32) NOT NULL DEFAULT '#6366F1',
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `slug`, `name`, `icon`, `color`, `sort_order`) VALUES
(1, 'electronic', 'Электроника', 'cpu', '#6366F1', 0),
(2, 'rock', 'Рок', 'zap', '#EC4899', 1),
(3, 'hip-hop', 'Хип-хоп', 'mic', '#F59E0B', 2),
(4, 'jazz', 'Джаз', 'music', '#10B981', 3),
(5, 'ambient', 'Эмбиент', 'wind', '#38BDF8', 4),
(6, 'indie-pop', 'Инди и Поп', 'heart', '#A855F7', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1795651761),
('m261126_000001_create_user_table', 1795651761),
('m261126_000002_create_music_tables', 1795651761),
('m261126_000003_seed_initial_data', 1795651762);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `author_name` varchar(128) NOT NULL,
  `author_avatar` varchar(512) NOT NULL DEFAULT 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80',
  `author_role` varchar(128) NOT NULL DEFAULT 'Слушатель (MusikZone)',
  `rating` int(11) NOT NULL,
  `date_label` varchar(64) NOT NULL DEFAULT 'Только что',
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `pros_json` text NOT NULL DEFAULT '[]',
  `cons_json` text NOT NULL DEFAULT '[]',
  `likes` int(11) NOT NULL DEFAULT 0,
  `status` varchar(32) NOT NULL DEFAULT 'published',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `album_id`, `user_id`, `author_name`, `author_avatar`, `author_role`, `rating`, `date_label`, `title`, `text`, `pros_json`, `cons_json`, `likes`, `status`, `created_at`) VALUES
(1, 1, NULL, 'Александр Пистолетов', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2m5l88apemBgia0DM9_aGmj-x4aOEh1MQIqYF4XGNHg&s=10', 'Музыкальный исполнитель', 10, '12 января 2026', 'Памятник золотой эре звукозаписи', 'Альбом звучит как непреходящая классика. Запись живых барабанов, басовые партии Роджерса и вокодерные гармонии вызывают мурашки при каждом прослушивании. Трек «Giorgio by Moroder» — образец кинематографичного повествования в электронике.', '[\"Идеальный аналоговый мастеринг\",\"Звездный состав музыкантов\",\"Атмосфера ностальгии без копирования\"]', '[\"Некоторые композиции требуют терпения\"]', 128, 'published', 1795651761),
(2, 1, NULL, 'Олег Монгол', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTORqy-5TFRslFa1dzZ4Xi26Ka7aJtQRFDLicjNKLtdTA&s=10', 'Слушатель', 9, '28 февраля 2026', 'Альбом, который взрослеет вместе с тобой', 'В 2013-м казалось, что это просто приятный фанк, но спустя годы понимаешь масштаб проделанной работы. Звук кристально чистый, даже в обычных наушниках сцена раскрывается потрясающе.', '[\"Многослойный звук\",\"Эмоциональный трек «Touch»\"]', '[\"Мало клубных бэнгеров в стиле старых Daft Punk\"]', 64, 'published', 1795651761),
(3, 2, NULL, 'Антон Евгеньевич', 'https://static.wikia.nocookie.net/hunterxhunter/images/5/54/6b7c9ff99ae7a0019ecc3ba763d0407b.jpg/revision/latest?cb=20200815174831&path-prefix=ru', 'Куратор каталога', 10, '5 марта 2026', 'Пророческая пластинка, не потерявшая актуальности', 'Сложно найти более цельный концептуальный альбом в альтернативной музыке. «Paranoid Android» — это Богемская Рапсодия девяностых, меняющая темп и структуру трижды за 6 минут.', '[\"Гениальная композиция треков\",\"Невероятный вокал Тома Йорка\",\"Глубокая лирика\"]', '[\"Нет\"]', 215, 'published', 1795651761),
(4, 3, NULL, 'Даниил Орлов', 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80', 'Хип-хоп журналист', 10, '18 апреля 2026', 'Учебник музыки и социальной драматургии', 'Удивительно, как этот альбом звучит сейчас: свежо, агрессивно и в то же время невероятно интеллигентно. Живые соло Камаси Вашингтона и безумный бас Thundercat делают каждую секунду насыщенной.', '[\"Блестящая джазовая инструменталка\",\"Мощнейшие тексты\",\"Катарсический финал\"]', '[\"Требует внимательного вдумчивого прослушивания\"]', 180, 'published', 1795651761),
(5, 4, NULL, 'Артем Резников', 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&auto=format&fit=crop&q=80', 'Звукорежиссер', 10, '10 февраля 2026', 'Звуковой эталон для аудиофилов', 'Этот альбом тестирует вашу аудиосистему: переход от биения сердца к гитарным партиям Гилмора в «Time» — чистая магия. Сведение 1973 года превосходит многие современные цифровые релизы.', '[\"Идеальный динамический диапазон\",\"Бессмертные гитарные соло\",\"Концептуальное единство\"]', '[\"Нет\"]', 310, 'published', 1795651761),
(6, 5, NULL, 'София Миронова', 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&auto=format&fit=crop&q=80', 'Музыкальный блогер', 9, '14 января 2026', 'Взрослый, ранимый и технически безупречный альбом', 'Финнеас превзошел сам себя в продакшене трека «CHIHIRO» — этот пульсирующий бас в стиле французского хауса вводит в гипноз. А «BIRDS OF A FEATHER» — самая светлая баллада года.', '[\"Удивительные модуляции темпа в треках\",\"Зрелая лирика\",\"Широкая звуковая палитра\"]', '[\"Хотелось бы еще 2-3 композиции\"]', 142, 'published', 1795651761),
(7, 6, NULL, 'Игорь Капустин', 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=100&auto=format&fit=crop&q=80', 'Преподаватель гармонии', 10, '20 февраля 2026', 'Тишина между нотами имеет такое же значение, как и сами ноты', 'Вступительные аккорды фортепиано Билла Эванса в «Blue in Green» — это чистая поэзия. Не существует человека, который послушал бы эту пластинку в темноте и остался равнодушным.', '[\"Идеальный состав мастеров\",\"Медитативная атмосфера\",\"Вечный стиль\"]', '[\"Нет\"]', 95, 'published', 1795651761),
(8, 7, NULL, 'Максим Левин', 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=100&auto=format&fit=crop&q=80', 'Слушатель', 9, '11 января 2026', 'Звуковая лавина, от которой невозможно оторваться', 'То, как Паркер сводит фазинг на тарелках и живой компрессированный бас — это магия. Семь минут «Let It Happen» пролетают за одно мгновение.', '[\"Гипнотический грув\",\"Уникальный продакшн\",\"Прилипчивые мелодии\"]', '[\"Пара интерлюдий кажутся короткими\"]', 77, 'published', 1795651761),
(9, 8, NULL, 'Кирилл Шахов', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80', 'Музыкальный обозреватель', 10, '3 ноября 2024', 'Исповедь взрослеющего гения', 'Тайлер продолжает эволюционировать от бунтаря до выдающегося продюсера и мыслителя. Трек «Like Him» разбивает сердце, а продакшен «Sticky» заставляет прыгать на месте.', '[\"Исключительная честность\",\"Оркестровые и хор-элементы\",\"Бешеная энергетика\"]', '[\"Контрастные переходы могут показаться резкими\"]', 165, 'published', 1795651761),
(10, 9, NULL, 'Полина Белова', 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=100&auto=format&fit=crop&q=80', 'Звуковой дизайнер', 10, '15 января 2026', 'Тёплое аналоговое свечение вне времени', '«Xtal» открывает альбом звуками, которые будто пробиваются сквозь туман сновидений. Потрясающе, как музыка, созданная более 30 лет назад на кассетах, звучит футуристичнее современного EDM.', '[\"Неповторимая атмосфера\",\"Мягкий ритмический рисунок\",\"Идеально для работы и медитации\"]', '[\"Нет\"]', 88, 'published', 1795651761),
(11, 10, NULL, 'Роман Кравцов', 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&auto=format&fit=crop&q=80', 'Слушатель', 10, '12 февраля 2026', 'Нуарный шедевр, который затягивает в темноту', 'Нарастающий бас в треке «Angel» до сих пор заставляет затаить дыхание. Это пластинка для ночных поездок и глубокого погружения в меланхолию.', '[\"Кинематографический звук\",\"Вокал Элизабет Фрейзер\",\"Тяжелый глубокий бас\"]', '[\"Не для легкого настроения\"]', 112, 'published', 1795651761),
(12, 11, NULL, 'Алина Зимина', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80', 'Слушатель', 9, '19 января 2026', 'Поп-музыка высшей пробы', 'После мрачного вступления альбом несется на безумной скорости через ночной Лас-Вегас. Комбинация синтвейва и фирменного фальцета Эйбела звучит безупречно.', '[\"Хит за хитом\",\"Невероятный визуальный стиль\",\"Продюсирование OPN\"]', '[\"Некоторые треки заиграны на радио\"]', 99, 'published', 1795651761);

-- --------------------------------------------------------

--
-- Структура таблицы `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` varchar(32) NOT NULL DEFAULT '3:30',
  `plays` varchar(32) NOT NULL DEFAULT '1M',
  `is_hit` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `track`
--

INSERT INTO `track` (`id`, `album_id`, `number`, `title`, `duration`, `plays`, `is_hit`) VALUES
(1, 1, 1, 'Give Life Back to Music', '4:34', '142M', 0),
(2, 1, 2, 'The Game of Love', '5:21', '48M', 0),
(3, 1, 3, 'Giorgio by Moroder', '9:04', '95M', 0),
(4, 1, 4, 'Within', '3:48', '56M', 0),
(5, 1, 5, 'Instant Crush (feat. Julian Casablancas)', '5:37', '320M', 1),
(6, 1, 6, 'Lose Yourself to Dance (feat. Pharrell Williams)', '5:53', '185M', 0),
(7, 1, 7, 'Touch (feat. Paul Williams)', '8:18', '44M', 0),
(8, 1, 8, 'Get Lucky (feat. Pharrell Williams)', '6:07', '940M', 1),
(9, 1, 9, 'Beyond', '4:50', '39M', 0),
(10, 1, 10, 'Motherboard', '5:41', '31M', 0),
(11, 1, 11, 'Fragments of Time (feat. Todd Edwards)', '4:39', '52M', 0),
(12, 1, 12, 'Doin\' It Right (feat. Panda Bear)', '4:11', '110M', 0),
(13, 1, 13, 'Contact', '6:21', '42M', 0),
(14, 2, 1, 'Airbag', '4:44', '76M', 0),
(15, 2, 2, 'Paranoid Android', '6:23', '240M', 1),
(16, 2, 3, 'Subterranean Homesick Alien', '4:27', '52M', 0),
(17, 2, 4, 'Exit Music (For a Film)', '4:24', '190M', 1),
(18, 2, 5, 'Let Down', '4:59', '98M', 0),
(19, 2, 6, 'Karma Police', '4:21', '480M', 1),
(20, 2, 7, 'Fitter Happier', '1:57', '22M', 0),
(21, 2, 8, 'Electioneering', '3:50', '31M', 0),
(22, 2, 9, 'Climbing Up the Walls', '4:45', '41M', 0),
(23, 2, 10, 'No Surprises', '3:48', '590M', 1),
(24, 2, 11, 'Lucky', '4:19', '47M', 0),
(25, 2, 12, 'The Tourist', '5:24', '35M', 0),
(26, 3, 1, 'Wesley\'s Theory (feat. George Clinton & Thundercat)', '4:47', '130M', 0),
(27, 3, 2, 'For Free? (Interlude)', '2:10', '65M', 0),
(28, 3, 3, 'King Kunta', '3:54', '480M', 1),
(29, 3, 4, 'Institutionalized', '4:31', '72M', 0),
(30, 3, 5, 'These Walls (feat. Bilal & Anna Wise)', '5:00', '115M', 0),
(31, 3, 6, 'u', '4:28', '88M', 0),
(32, 3, 7, 'Alright', '3:39', '620M', 1),
(33, 3, 8, 'For Sale? (Interlude)', '4:51', '55M', 0),
(34, 3, 9, 'Momma', '4:43', '49M', 0),
(35, 3, 10, 'Hood Politics', '4:52', '78M', 0),
(36, 3, 11, 'How Much a Dollar Cost', '4:21', '92M', 0),
(37, 3, 12, 'Complexion (A Zulu Love)', '4:23', '54M', 0),
(38, 3, 13, 'The Blacker the Berry', '5:28', '140M', 1),
(39, 3, 14, 'You Ain\'t Gotta Lie (Momma Said)', '4:01', '41M', 0),
(40, 3, 15, 'i', '5:36', '210M', 0),
(41, 3, 16, 'Mortal Man', '12:07', '38M', 0),
(42, 4, 1, 'Speak to Me', '1:05', '120M', 0),
(43, 4, 2, 'Breathe (In the Air)', '2:49', '290M', 1),
(44, 4, 3, 'On the Run', '3:45', '95M', 0),
(45, 4, 4, 'Time', '6:53', '410M', 1),
(46, 4, 5, 'The Great Gig in the Sky', '4:44', '280M', 1),
(47, 4, 6, 'Money', '6:22', '510M', 1),
(48, 4, 7, 'Us and Them', '7:50', '230M', 0),
(49, 4, 8, 'Any Colour You Like', '3:26', '89M', 0),
(50, 4, 9, 'Brain Damage', '3:47', '180M', 0),
(51, 4, 10, 'Eclipse', '2:12', '140M', 0),
(52, 5, 1, 'SKINNY', '3:39', '160M', 0),
(53, 5, 2, 'LUNCH', '2:59', '480M', 1),
(54, 5, 3, 'CHIHIRO', '5:03', '390M', 1),
(55, 5, 4, 'BIRDS OF A FEATHER', '3:30', '810M', 1),
(56, 5, 5, 'WILDFLOWER', '4:21', '310M', 1),
(57, 5, 6, 'THE GREATEST', '4:53', '190M', 0),
(58, 5, 7, 'L\'AMOUR DE MA VIE', '5:33', '240M', 0),
(59, 5, 8, 'THE DINER', '3:06', '120M', 0),
(60, 5, 9, 'BITTERSUITE', '4:58', '110M', 0),
(61, 5, 10, 'BLUE', '5:43', '175M', 0),
(62, 6, 1, 'So What', '9:22', '240M', 1),
(63, 6, 2, 'Freddie Freeloader', '9:46', '95M', 0),
(64, 6, 3, 'Blue in Green', '5:37', '180M', 1),
(65, 6, 4, 'All Blues', '11:33', '110M', 0),
(66, 6, 5, 'Flamenco Sketches', '9:26', '75M', 0),
(67, 7, 1, 'Let It Happen', '7:46', '410M', 1),
(68, 7, 2, 'Nangs', '1:47', '120M', 0),
(69, 7, 3, 'The Moment', '4:15', '160M', 0),
(70, 7, 4, 'Yes I\'m Changing', '4:30', '185M', 0),
(71, 7, 5, 'Eventually', '5:19', '340M', 1),
(72, 7, 6, 'Gossip', '0:55', '45M', 0),
(73, 7, 7, 'The Less I Know the Better', '3:36', '1420M', 1),
(74, 7, 8, 'Past Life', '3:47', '89M', 0),
(75, 7, 9, 'Disciples', '1:48', '76M', 0),
(76, 7, 10, '\'Cause I\'m a Man', '4:01', '130M', 0),
(77, 7, 11, 'Reality in Motion', '4:12', '68M', 0),
(78, 7, 12, 'Love/Paranoia', '3:06', '92M', 0),
(79, 7, 13, 'New Person, Same Old Mistakes', '6:02', '250M', 1),
(80, 8, 1, 'St. Chroma (feat. Daniel Caesar)', '3:17', '240M', 1),
(81, 8, 2, 'Rah Tah Tah', '2:45', '180M', 0),
(82, 8, 3, 'Noid', '4:44', '210M', 1),
(83, 8, 4, 'Darling, I (feat. Teezo Touchdown)', '4:13', '190M', 1),
(84, 8, 5, 'Hey Jane', '4:00', '98M', 0),
(85, 8, 6, 'I Killed You', '2:48', '115M', 0),
(86, 8, 7, 'Judge Judy', '4:29', '89M', 0),
(87, 8, 8, 'Sticky (feat. GloRilla, Sexyy Red & Lil Wayne)', '4:15', '310M', 1),
(88, 8, 9, 'Take Your Mask Off', '4:04', '130M', 0),
(89, 8, 10, 'Tomorrow', '3:02', '95M', 0),
(90, 8, 11, 'Thought I Was Dead (feat. ScHoolboy Q)', '3:27', '140M', 0),
(91, 8, 12, 'Like Him (feat. Lola Young)', '4:38', '185M', 0),
(92, 8, 13, 'Balloon (feat. Doechii)', '2:34', '120M', 0),
(93, 8, 14, 'I Hope You Find Your Way Home', '4:29', '110M', 0),
(94, 9, 1, 'Xtal', '4:54', '140M', 1),
(95, 9, 2, 'Tha', '9:06', '65M', 0),
(96, 9, 3, 'Pulsewidth', '3:48', '82M', 0),
(97, 9, 4, 'Ageispolis', '5:23', '98M', 1),
(98, 9, 5, 'i', '1:17', '40M', 0),
(99, 9, 6, 'Green Calx', '6:05', '45M', 0),
(100, 9, 7, 'Heliosphan', '4:51', '76M', 1),
(101, 9, 8, 'We Are the Music Makers', '7:43', '55M', 0),
(102, 9, 9, 'Schottkey 7th Path', '4:26', '38M', 0),
(103, 9, 10, 'Ptolemy', '4:10', '49M', 0),
(104, 9, 11, 'Hedphelym', '6:00', '34M', 0),
(105, 9, 12, 'Delphium', '5:26', '39M', 0),
(106, 9, 13, 'Actium', '7:32', '42M', 0),
(107, 10, 1, 'Angel', '6:18', '210M', 1),
(108, 10, 2, 'Risingson', '4:58', '98M', 0),
(109, 10, 3, 'Teardrop', '5:29', '480M', 1),
(110, 10, 4, 'Inertia Creeps', '5:56', '88M', 1),
(111, 10, 5, 'Exchange', '4:11', '42M', 0),
(112, 10, 6, 'Dissolved Girl', '6:07', '76M', 0),
(113, 10, 7, 'Man Next Door', '5:55', '54M', 0),
(114, 10, 8, 'Black Milk', '6:20', '62M', 0),
(115, 10, 9, 'Mezzanine', '5:54', '49M', 0),
(116, 10, 10, 'Group Four', '8:13', '41M', 0),
(117, 10, 11, '(Exchange)', '4:08', '29M', 0),
(118, 11, 1, 'Alone Again', '4:10', '180M', 0),
(119, 11, 2, 'Too Late', '3:59', '210M', 0),
(120, 11, 3, 'Hardest to Love', '3:31', '260M', 0),
(121, 11, 4, 'Scared to Live', '3:11', '190M', 0),
(122, 11, 5, 'Snowchild', '4:07', '175M', 0),
(123, 11, 6, 'Escape from LA', '5:55', '220M', 0),
(124, 11, 7, 'Heartless', '3:18', '890M', 1),
(125, 11, 8, 'Faith', '4:43', '240M', 1),
(126, 11, 9, 'Blinding Lights', '3:20', '4300M', 1),
(127, 11, 10, 'In Your Eyes', '3:57', '980M', 1),
(128, 11, 11, 'Save Your Tears', '3:35', '2100M', 1),
(129, 11, 12, 'Repeat After Me (Interlude)', '3:15', '140M', 0),
(130, 11, 13, 'After Hours', '6:01', '520M', 1),
(131, 11, 14, 'Until I Bleed Out', '3:10', '110M', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `display_name` varchar(128) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'user',
  `avatar` varchar(512) NOT NULL DEFAULT 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80',
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `display_name`, `role`, `avatar`, `password_hash`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@musikzone.local', 'Администратор MusikZone', 'admin', 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80', '$2y$13$bzAw7ILoRGnjYSbqbn6tEepfjnLK6p/QYhxSNqLcLU4un6cP1pJOi', 'jO6kXevFgNwUI8wB9mN55Z9EhitzbXF5', 1795651761, 1795651761),
(2, 'demo', 'demo@musikzone.local', 'Артем Соколов', 'user', 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80', '$2y$13$TnmoUFrlxa1ViIfTlCuP9un66Oond.qxqa.yzkvMWfMbi7DhrBqtq', 'uqq5nJ_hnrEAFrLBXdQyjCijQmfbgT7N', 1795651761, 1795651761);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `track_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
