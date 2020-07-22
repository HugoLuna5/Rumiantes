SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rumiantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animals`
--

CREATE TABLE `animals` (
  `no_animal` bigint(20) NOT NULL,
  `father_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mother_id` bigint(20) UNSIGNED DEFAULT NULL,
  `race_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purpose_id` bigint(20) UNSIGNED DEFAULT NULL,
  `livestock_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batche_id` bigint(20) UNSIGNED DEFAULT NULL,
  `birthday` date NOT NULL,
  `gender` enum('Macho','Hembra') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `animals`
--

INSERT INTO `animals` (`no_animal`, `father_id`, `mother_id`, `race_id`, `purpose_id`, `livestock_id`, `batche_id`, `birthday`, `gender`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 1, 1, 1, '2020-01-01', 'Macho', 'Animal 1', '2020-07-22 23:39:52', '2020-07-22 23:39:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal_relation_stage_weights`
--

CREATE TABLE `animal_relation_stage_weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animal_no` bigint(20) UNSIGNED DEFAULT NULL,
  `stage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `weight_id` bigint(20) UNSIGNED DEFAULT NULL,
  `diet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `weight_to_gain_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_gain_weight` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `animal_relation_stage_weights`
--

INSERT INTO `animal_relation_stage_weights` (`id`, `animal_no`, `stage_id`, `weight_id`, `diet_id`, `weight_to_gain_id`, `date_gain_weight`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, NULL, NULL, '2020-06-01', '2020-07-23 01:00:22', '2020-07-23 01:00:22'),
(3, 1, 1, 2, 1, 4, '2020-12-01', '2020-07-23 01:06:38', '2020-07-23 01:06:38'),
(4, 1, 3, 3, 1, 5, '2021-06-01', '2020-07-23 01:11:53', '2020-07-23 01:11:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `batches`
--

INSERT INTO `batches` (`id`, `number`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lote número 1', '2020-07-22 14:06:42', '2020-07-22 14:06:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diets`
--

CREATE TABLE `diets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ration_kg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protein_requirement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `diets`
--

INSERT INTO `diets` (`id`, `name`, `ration_kg`, `protein_requirement`, `created_at`, `updated_at`) VALUES
(1, 'Dieta Pastoreo', '200', '16', '2020-07-22 13:01:43', '2020-07-22 13:01:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `livestocks`
--

CREATE TABLE `livestocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `livestocks`
--

INSERT INTO `livestocks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ganaderia 1', '2020-07-22 14:06:17', '2020-07-22 14:06:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_11_124456_create_animals_table', 1),
(5, '2020_07_11_132149_create_livestocks_table', 1),
(6, '2020_07_11_132232_create_batches_table', 1),
(7, '2020_07_11_132331_create_stages_table', 1),
(8, '2020_07_11_132358_create_races_table', 1),
(9, '2020_07_11_132427_create_purposes_table', 1),
(10, '2020_07_11_132546_create_diets_table', 1),
(11, '2020_07_11_132821_create_raw_materials_table', 1),
(12, '2020_07_11_133111_create_raw_material_diets_table', 1),
(13, '2020_07_11_133334_create_animal_relation_stage_weights_table', 1),
(14, '2020_07_11_133518_create_weights_table', 1),
(15, '2020_07_11_140227_add_relationship', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purposes`
--

CREATE TABLE `purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `purposes`
--

INSERT INTO `purposes` (`id`, `purpose`, `created_at`, `updated_at`) VALUES
(1, 'Propósito 1', '2020-07-22 14:21:00', '2020-07-22 14:21:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `races`
--

CREATE TABLE `races` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `races`
--

INSERT INTO `races` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Angus', '2020-07-13 11:30:51', '2020-07-13 11:30:51'),
(2, 'Angus Rojo', '2020-07-13 11:31:06', '2020-07-13 11:31:06'),
(3, 'Angus Negro', '2020-07-13 11:31:16', '2020-07-13 11:31:16'),
(4, 'Aberden Angus', '2020-07-13 11:31:25', '2020-07-13 11:31:25'),
(5, 'Alpina Francesa', '2020-07-13 11:31:32', '2020-07-13 11:31:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('FP','FE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage_pb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `name`, `type`, `percentage_pb`, `created_at`, `updated_at`) VALUES
(1, 'Harina de pescado', 'FP', '63', '2020-07-13 10:14:01', '2020-07-13 10:14:01'),
(2, 'Torta de soya', 'FP', '44', '2020-07-13 10:14:18', '2020-07-13 10:14:18'),
(3, 'Morera', 'FP', '21.5', '2020-07-13 10:14:26', '2020-07-13 10:14:26'),
(4, 'Pasta estrella', 'FE', '11', '2020-07-13 10:14:37', '2020-07-13 10:14:37'),
(5, 'Maíz', 'FE', '11', '2020-07-13 10:14:50', '2020-07-13 10:14:50'),
(6, 'Pasto brachiaria', 'FE', '10.5', '2020-07-13 10:15:04', '2020-07-13 10:15:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raw_material_diets`
--

CREATE TABLE `raw_material_diets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `raw_material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `diet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `raw_material_diets`
--

INSERT INTO `raw_material_diets` (`id`, `raw_material_id`, `diet_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-07-22 13:01:43', '2020-07-22 13:01:43'),
(2, 4, 1, '2020-07-22 13:01:44', '2020-07-22 13:01:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stages`
--

INSERT INTO `stages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ternero', '2020-07-13 11:17:47', '2020-07-13 11:17:47'),
(2, 'Destetado', '2020-07-13 11:17:58', '2020-07-13 11:17:58'),
(3, 'Novillo', '2020-07-13 11:18:04', '2020-07-13 11:18:04'),
(4, 'Toro', '2020-07-13 11:18:13', '2020-07-13 11:18:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name_p` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name_m` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('Masculino','Femenino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name_p`, `last_name_m`, `birthday`, `gender`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hugo Dario', 'Luna', 'Cruz', '1999-11-01', 'Masculino', 'hugo_1199@hotmail.com', NULL, '$2y$10$lZYCYOAuZM//gEoKJrRTKeSOMHfvv9IfH7JLOCNpJQX67Z8IHGnre', NULL, '2020-07-11 22:02:23', '2020-07-11 22:02:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `weights`
--

INSERT INTO `weights` (`id`, `weight`, `created_at`, `updated_at`) VALUES
(1, 50, '2020-07-22 23:28:47', '2020-07-22 23:28:47'),
(2, 60, '2020-07-22 23:28:56', '2020-07-22 23:28:56'),
(3, 80, '2020-07-22 23:28:59', '2020-07-22 23:28:59'),
(4, 10, '2020-07-23 01:06:07', '2020-07-23 01:06:07'),
(5, 20, '2020-07-23 01:11:25', '2020-07-23 01:11:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`no_animal`),
  ADD KEY `animals_livestock_id_foreign` (`livestock_id`),
  ADD KEY `animals_batche_id_foreign` (`batche_id`),
  ADD KEY `animals_purpose_id_foreign` (`purpose_id`),
  ADD KEY `animals_race_id_foreign` (`race_id`);

--
-- Indices de la tabla `animal_relation_stage_weights`
--
ALTER TABLE `animal_relation_stage_weights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_relation_stage_weights_stage_id_foreign` (`stage_id`),
  ADD KEY `animal_relation_stage_weights_weight_id_foreign` (`weight_id`),
  ADD KEY `animal_relation_stage_weights_diet_id_foreign` (`diet_id`),
  ADD KEY `animal_relation_stage_weights_weight_to_gain_id_foreign` (`weight_to_gain_id`);

--
-- Indices de la tabla `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diets`
--
ALTER TABLE `diets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `livestocks`
--
ALTER TABLE `livestocks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `purposes`
--
ALTER TABLE `purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `raw_material_diets`
--
ALTER TABLE `raw_material_diets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_material_diets_diet_id_foreign` (`diet_id`),
  ADD KEY `raw_material_diets_raw_material_id_foreign` (`raw_material_id`);

--
-- Indices de la tabla `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animals`
--
ALTER TABLE `animals`
  MODIFY `no_animal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `animal_relation_stage_weights`
--
ALTER TABLE `animal_relation_stage_weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `diets`
--
ALTER TABLE `diets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `livestocks`
--
ALTER TABLE `livestocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `purposes`
--
ALTER TABLE `purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `races`
--
ALTER TABLE `races`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `raw_material_diets`
--
ALTER TABLE `raw_material_diets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_batche_id_foreign` FOREIGN KEY (`batche_id`) REFERENCES `batches` (`id`),
  ADD CONSTRAINT `animals_livestock_id_foreign` FOREIGN KEY (`livestock_id`) REFERENCES `livestocks` (`id`),
  ADD CONSTRAINT `animals_purpose_id_foreign` FOREIGN KEY (`purpose_id`) REFERENCES `purposes` (`id`),
  ADD CONSTRAINT `animals_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`);

--
-- Filtros para la tabla `animal_relation_stage_weights`
--
ALTER TABLE `animal_relation_stage_weights`
  ADD CONSTRAINT `animal_relation_stage_weights_diet_id_foreign` FOREIGN KEY (`diet_id`) REFERENCES `diets` (`id`),
  ADD CONSTRAINT `animal_relation_stage_weights_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`),
  ADD CONSTRAINT `animal_relation_stage_weights_weight_id_foreign` FOREIGN KEY (`weight_id`) REFERENCES `weights` (`id`),
  ADD CONSTRAINT `animal_relation_stage_weights_weight_to_gain_id_foreign` FOREIGN KEY (`weight_to_gain_id`) REFERENCES `weights` (`id`);

--
-- Filtros para la tabla `raw_material_diets`
--
ALTER TABLE `raw_material_diets`
  ADD CONSTRAINT `raw_material_diets_diet_id_foreign` FOREIGN KEY (`diet_id`) REFERENCES `diets` (`id`),
  ADD CONSTRAINT `raw_material_diets_raw_material_id_foreign` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
