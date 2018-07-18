CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `house` varchar(20) NOT NULL,
  `flat` varchar(20) DEFAULT NULL,
  `created_by` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
