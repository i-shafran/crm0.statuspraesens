CREATE TABLE IF NOT EXISTS `process` (
  `id` int(11) NOT NULL,
  `time_start` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Время старта',
  `csv_string_count` int(11) DEFAULT NULL,
  `stop` tinyint(1) DEFAULT NULL COMMENT 'Метка стоп процесс',
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `insert_count` int(11) DEFAULT NULL,
  `update_count` int(11) DEFAULT NULL,
  `csv_done` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Процесс';

ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);