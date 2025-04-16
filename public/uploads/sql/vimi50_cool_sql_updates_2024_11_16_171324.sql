CREATE TABLE `article_rate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `user_ip` varchar(191) DEFAULT NULL,
  `last_rate` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_rate_article_id_index` (`article_id`),
  KEY `article_rate_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `article_tag` (
  `article_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `article_tag_article_id_index` (`article_id`),
  KEY `article_tag_tag_id_index` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `article_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned DEFAULT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `language` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `rate_total` int(11) NOT NULL DEFAULT 0,
  `rate_helpful` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `articlesettings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `val` text DEFAULT NULL,
  `type` char(20) NOT NULL DEFAULT 'string',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `audits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(191) NOT NULL,
  `auditable_type` varchar(191) NOT NULL,
  `auditable_id` bigint(20) unsigned NOT NULL,
  `old_values` text DEFAULT NULL,
  `new_values` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(1023) DEFAULT NULL,
  `tags` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `custom_fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `rules` text DEFAULT NULL,
  `rules_messages` longtext DEFAULT NULL,
  `location` varchar(191) NOT NULL,
  `value` longtext NOT NULL,
  `field_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `customer_purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `purchase_code` char(36) NOT NULL,
  `buyer` varchar(191) DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `sold_at` datetime NOT NULL,
  `license` varchar(191) NOT NULL,
  `support_amount` double(8,2) NOT NULL,
  `supported_until` datetime NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `item_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_icon` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_purchases_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `helpguide_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `thumbnail` varchar(191) DEFAULT NULL,
  `category_order` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `has_ticket` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `helpguide_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `mime_type` varchar(191) DEFAULT NULL,
  `disk` varchar(191) NOT NULL,
  `conversions_disk` varchar(191) DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` text NOT NULL,
  `custom_properties` text NOT NULL,
  `responsive_images` text NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `generated_conversions` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `helpguide_model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `helpguide_model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `helpguide_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `helpguide_role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `helpguide_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `helpguide_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `val` text DEFAULT NULL,
  `type` char(20) NOT NULL DEFAULT 'string',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `metas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) NOT NULL,
  `value` text NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `myhealth_specializations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `push_notification_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `saved_replies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `sms_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `members` longtext DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
CREATE TABLE `social_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `provider` varchar(30) NOT NULL,
  `name` varchar(95) DEFAULT NULL,
  `email` varchar(95) DEFAULT NULL,
  `avatar` varchar(1024) DEFAULT NULL,
  `provider_user_id` varchar(100) DEFAULT NULL,
  `provider_username` varchar(100) DEFAULT NULL,
  `access_token` text DEFAULT NULL,
  `refresh_token` text DEFAULT NULL,
  `expires_in` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `social_accounts_provider_provider_user_id_unique` (`provider`,`provider_user_id`),
  KEY `social_accounts_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `ticket_conversation` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_conversation_ticket_id_foreign` (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `starred` tinyint(1) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `priority` enum('urgent','high','medium','low') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
DROP TABLE IF EXISTS `base_change_log`;
ALTER TABLE `business` MODIFY COLUMN `last_sms_notification` int(11)
, MODIFY COLUMN `company_number` varchar(191)
, MODIFY COLUMN `business_categories` text
, MODIFY COLUMN `day_end_enable` int(11)
, MODIFY COLUMN `sms_non_delivery` int(11)
, MODIFY COLUMN `start_date` date
, MODIFY COLUMN `tax_number_1` varchar(100)
, MODIFY COLUMN `tax_label_1` varchar(10)
, MODIFY COLUMN `tax_number_2` varchar(100)
, MODIFY COLUMN `tax_label_2` varchar(10)
, MODIFY COLUMN `default_sales_tax` int(10) unsigned
, MODIFY COLUMN `time_zone` varchar(191) NOT NULL DEFAULT 'Asia/Kolkata'
, MODIFY COLUMN `accounting_method` enum('fifo','lifo','avco') NOT NULL DEFAULT 'fifo'
, MODIFY COLUMN `default_sales_discount` decimal(5,2)
, MODIFY COLUMN `sell_price_tax` enum('includes','excludes') NOT NULL DEFAULT 'includes'
, MODIFY COLUMN `logo` varchar(191)
, MODIFY COLUMN `sku_prefix` varchar(191)
, MODIFY COLUMN `expiry_type` enum('add_expiry','add_manufacturing') NOT NULL DEFAULT 'add_expiry'
, MODIFY COLUMN `on_product_expiry` enum('keep_selling','stop_selling','auto_delete') NOT NULL DEFAULT 'keep_selling'
, MODIFY COLUMN `sale_import_date` date
, MODIFY COLUMN `purchase_import_date` date
, MODIFY COLUMN `purchase_currency_id` int(10) unsigned
, MODIFY COLUMN `keyboard_shortcuts` text
, MODIFY COLUMN `pos_settings` text
, MODIFY COLUMN `manufacturing_settings` text
, MODIFY COLUMN `default_unit` int(11)
, MODIFY COLUMN `sales_cmsn_agnt` enum('logged_in_user','user','cmsn_agnt')
, MODIFY COLUMN `currency_symbol_placement` enum('before','after') NOT NULL DEFAULT 'before'
, MODIFY COLUMN `enabled_modules` text
, MODIFY COLUMN `date_format` varchar(191) NOT NULL DEFAULT 'm/d/Y'
, MODIFY COLUMN `time_format` enum('12','24') NOT NULL DEFAULT '24'
, MODIFY COLUMN `ref_no_prefixes` text
, MODIFY COLUMN `theme_color` char(20)
, MODIFY COLUMN `created_by` int(11)
, MODIFY COLUMN `crm_settings` text
, MODIFY COLUMN `rp_name` varchar(191)
, MODIFY COLUMN `max_rp_per_order` int(11)
, MODIFY COLUMN `min_redeem_point` int(11)
, MODIFY COLUMN `max_redeem_point` int(11)
, MODIFY COLUMN `rp_expiry_period` int(11)
, MODIFY COLUMN `rp_expiry_type` enum('month','year') NOT NULL DEFAULT 'year'
, MODIFY COLUMN `email_settings` text
, MODIFY COLUMN `sms_settings` text
, MODIFY COLUMN `custom_labels` text
, MODIFY COLUMN `common_settings` text
, MODIFY COLUMN `currency_precision` varchar(15) DEFAULT '2'
, MODIFY COLUMN `reg_no` varchar(191)
, MODIFY COLUMN `quantity_precision` varchar(15) DEFAULT '2'
, MODIFY COLUMN `search_product_settings` varchar(191)
, MODIFY COLUMN `default_store` int(11)
, MODIFY COLUMN `patient_details_id` int(11)
, MODIFY COLUMN `background_showing_type` enum('only_background_image','background_image_and_logo')
, MODIFY COLUMN `background_image` text
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `ref_no_starting_number` text
, MODIFY COLUMN `repair_settings` text
, MODIFY COLUMN `visitor_qr_data` text
, MODIFY COLUMN `contact_fields` text
, MODIFY COLUMN `essentials_settings` text;
ALTER TABLE `business_locations` MODIFY COLUMN `location_id` varchar(191)
, MODIFY COLUMN `landmark` text
, MODIFY COLUMN `address_1` varchar(255)
, MODIFY COLUMN `address_2` varchar(255)
, MODIFY COLUMN `address_3` varchar(255)
, MODIFY COLUMN `latitude` float
, MODIFY COLUMN `longitude` float
, MODIFY COLUMN `timezone` varchar(100)
, MODIFY COLUMN `location_access_type` varchar(100)
, MODIFY COLUMN `selling_price_group_id` int(11)
, MODIFY COLUMN `receipt_printer_type` enum('browser','printer') NOT NULL DEFAULT 'browser'
, MODIFY COLUMN `printer_id` int(11)
, MODIFY COLUMN `mobile` varchar(191)
, MODIFY COLUMN `alternate_number` varchar(191)
, MODIFY COLUMN `email` varchar(191)
, MODIFY COLUMN `website` varchar(191)
, MODIFY COLUMN `default_payment_accounts` text
, MODIFY COLUMN `custom_field1` varchar(191)
, MODIFY COLUMN `custom_field2` varchar(191)
, MODIFY COLUMN `custom_field3` varchar(191)
, MODIFY COLUMN `custom_field4` varchar(191)
, MODIFY COLUMN `deleted_at` timestamp
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `district` varchar(100);
ALTER TABLE `cash_register_transactions` MODIFY COLUMN `pay_method` enum('cash','card','cheque','bank_transfer','custom_pay_1','custom_pay_2','custom_pay_3','other')
, MODIFY COLUMN `transaction_id` int(11)
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp;
ALTER TABLE `categories` MODIFY COLUMN `short_code` varchar(191)
, MODIFY COLUMN `default_product_category_id` bigint(10) unsigned
, MODIFY COLUMN `vat_exempted` varchar(10) NOT NULL DEFAULT 'No'
, MODIFY COLUMN `category_type` varchar(191)
, MODIFY COLUMN `add_related_account` enum('category_level','sub_category_level')
, MODIFY COLUMN `cogs_account_id` int(10)
, MODIFY COLUMN `sales_income_account_id` int(10)
, MODIFY COLUMN `weight_loss_expense_account_id` int(10) unsigned
, MODIFY COLUMN `weight_excess_income_account_id` int(10) unsigned
, MODIFY COLUMN `deleted_at` timestamp
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `description` text
, MODIFY COLUMN `remaining_stock_adjusts` varchar(10)
, MODIFY COLUMN `price_increment_acc` int(11)
, MODIFY COLUMN `price_reduction_acc` int(11)
, MODIFY COLUMN `nic` varchar(100)
, MODIFY COLUMN `vat_based_on` varchar(20) NOT NULL DEFAULT 'sale_price'
, MODIFY COLUMN `apply_vat_on` varchar(191) NOT NULL DEFAULT 'on_product_sub_category_settings';
ALTER TABLE `chequer_currencies` MODIFY COLUMN `iso` char(3) NOT NULL DEFAULT '';
ALTER TABLE `chequer_default_settings` MODIFY COLUMN `def_tempid` varchar(255) NOT NULL DEFAULT ''
, MODIFY COLUMN `def_curnctname` varchar(255) NOT NULL DEFAULT ''
, MODIFY COLUMN `def_stampid` varchar(255) NOT NULL DEFAULT ''
, MODIFY COLUMN `def_entrydt` varchar(255) NOT NULL DEFAULT ''
, MODIFY COLUMN `def_stamp` varchar(100)
, MODIFY COLUMN `def_bank_account` varchar(100)
, MODIFY COLUMN `def_autostart_chbk_no` int(11);
ALTER TABLE `chequer_purchase_orders` MODIFY COLUMN `purchase_bill_no` varchar(255) NOT NULL DEFAULT ''
, MODIFY COLUMN `supplier_order_no` varchar(50);
ALTER TABLE `chequer_stamps` MODIFY COLUMN `stamp_name` varchar(255) NOT NULL DEFAULT ''
, MODIFY COLUMN `stamp_entrydt` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `chequer_suppliers` MODIFY COLUMN `email` varchar(255)
, MODIFY COLUMN `address` longtext
, MODIFY COLUMN `tel` varchar(255)
, MODIFY COLUMN `fax` varchar(255)
, MODIFY COLUMN `updated_user_id` int(11)
, MODIFY COLUMN `updated_datetime` datetime
, MODIFY COLUMN `transaction_date` datetime
, MODIFY COLUMN `isPayee` int(11);
ALTER TABLE `contact_groups` DROP COLUMN `price_type`
, MODIFY COLUMN `type` enum('customer','supplier','both') NOT NULL DEFAULT 'customer'
, MODIFY COLUMN `supplier_group_id` int(11)
, MODIFY COLUMN `maximum_discount` decimal(10,2)
, MODIFY COLUMN `last_maximum_discount` decimal(10,5)
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `account_type_id` int(11)
, MODIFY COLUMN `interest_account_id` int(11);
ALTER TABLE `contacts` MODIFY COLUMN `register_module` enum('airline','shipping','other') NOT NULL DEFAULT 'other'
, MODIFY COLUMN `supplier_business_name` varchar(191)
, MODIFY COLUMN `email` varchar(191)
, MODIFY COLUMN `contact_id` varchar(191)
, MODIFY COLUMN `tax_number` varchar(191)
, MODIFY COLUMN `city` varchar(191)
, MODIFY COLUMN `address` text
, MODIFY COLUMN `address_2` text
, MODIFY COLUMN `address_3` text
, MODIFY COLUMN `geo_location` varchar(191)
, MODIFY COLUMN `state` varchar(191)
, MODIFY COLUMN `country` varchar(191)
, MODIFY COLUMN `landmark` varchar(191)
, MODIFY COLUMN `mobile` varchar(191)
, MODIFY COLUMN `whatsapp_number` varchar(191)
, MODIFY COLUMN `landline` varchar(191)
, MODIFY COLUMN `alternate_number` varchar(191)
, MODIFY COLUMN `pay_term_number` int(11)
, MODIFY COLUMN `pay_term_type` enum('days','months')
, MODIFY COLUMN `credit_limit` decimal(22,4)
, MODIFY COLUMN `converted_by` int(11)
, MODIFY COLUMN `converted_on` datetime
, MODIFY COLUMN `customer_group_id` int(11)
, MODIFY COLUMN `crm_source` varchar(255)
, MODIFY COLUMN `crm_life_stage` varchar(255)
, MODIFY COLUMN `supplier_group_id` int(10) unsigned
, MODIFY COLUMN `custom_field1` varchar(191)
, MODIFY COLUMN `custom_field2` varchar(191)
, MODIFY COLUMN `custom_field3` varchar(191)
, MODIFY COLUMN `custom_field4` varchar(191)
, MODIFY COLUMN `temp_approved_user` int(10)
, MODIFY COLUMN `temp_requested_by` int(10) unsigned
, MODIFY COLUMN `deleted_at` timestamp
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `image` varchar(191)
, MODIFY COLUMN `signature` varchar(191)
, MODIFY COLUMN `payment_account` text
, MODIFY COLUMN `security_deposit_asset_account` text
, MODIFY COLUMN `security_deposit_liability_account` text
, MODIFY COLUMN `nic_number` varchar(20)
, MODIFY COLUMN `contact_status` varchar(191) NOT NULL DEFAULT 'active'
, MODIFY COLUMN `user_id` int(11)
, MODIFY COLUMN `contact_transaction_date` timestamp
, MODIFY COLUMN `credit_notification` varchar(60)
, MODIFY COLUMN `vat_number` varchar(200)
, MODIFY COLUMN `sub_customers` varchar(200);
ALTER TABLE `countries` MODIFY COLUMN `country_code` char(2) NOT NULL DEFAULT ''
, MODIFY COLUMN `country` varchar(45) NOT NULL DEFAULT ''
, MODIFY COLUMN `currency_code` char(3);

ALTER TABLE `invoice_layouts` MODIFY COLUMN `header_text` text
, MODIFY COLUMN `font_size` int(11)
, MODIFY COLUMN `business_name_font_size` int(11)
, MODIFY COLUMN `invoice_heading_font_size` int(11)
, MODIFY COLUMN `header_font_size` int(11)
, MODIFY COLUMN `footer_font_size` int(11)
, MODIFY COLUMN `invoice_no_prefix` varchar(191)
, MODIFY COLUMN `quotation_no_prefix` varchar(191)
, MODIFY COLUMN `invoice_heading` varchar(191)
, MODIFY COLUMN `sub_heading_line1` varchar(191)
, MODIFY COLUMN `sub_heading_line2` varchar(191)
, MODIFY COLUMN `sub_heading_line3` varchar(191)
, MODIFY COLUMN `sub_heading_line4` varchar(191)
, MODIFY COLUMN `sub_heading_line5` varchar(191)
, MODIFY COLUMN `invoice_heading_not_paid` varchar(191)
, MODIFY COLUMN `invoice_heading_paid` varchar(191)
, MODIFY COLUMN `quotation_heading` varchar(191)
, MODIFY COLUMN `sub_total_label` varchar(191)
, MODIFY COLUMN `discount_label` varchar(191)
, MODIFY COLUMN `tax_label` varchar(191)
, MODIFY COLUMN `total_label` varchar(191)
, MODIFY COLUMN `total_due_label` varchar(191)
, MODIFY COLUMN `paid_label` varchar(191)
, MODIFY COLUMN `client_id_label` varchar(191)
, MODIFY COLUMN `client_tax_label` varchar(191)
, MODIFY COLUMN `date_label` varchar(191)
, MODIFY COLUMN `date_time_format` varchar(191)
, MODIFY COLUMN `sales_person_label` varchar(191)
, MODIFY COLUMN `table_product_label` varchar(191)
, MODIFY COLUMN `table_qty_label` varchar(191)
, MODIFY COLUMN `table_unit_price_label` varchar(191)
, MODIFY COLUMN `table_subtotal_label` varchar(191)
, MODIFY COLUMN `cat_code_label` varchar(191)
, MODIFY COLUMN `logo` varchar(191)
, MODIFY COLUMN `customer_label` varchar(191)
, MODIFY COLUMN `highlight_color` varchar(10)
, MODIFY COLUMN `footer_text` text
, MODIFY COLUMN `module_info` text
, MODIFY COLUMN `common_settings` text
, MODIFY COLUMN `design` varchar(256) DEFAULT 'classic'
, MODIFY COLUMN `cn_heading` varchar(191)
, MODIFY COLUMN `cn_no_label` varchar(191)
, MODIFY COLUMN `cn_amount_label` varchar(191)
, MODIFY COLUMN `table_tax_headings` text
, MODIFY COLUMN `prev_bal_label` varchar(191)
, MODIFY COLUMN `change_return_label` varchar(191)
, MODIFY COLUMN `product_custom_fields` text
, MODIFY COLUMN `contact_custom_fields` text
, MODIFY COLUMN `location_custom_fields` text
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `header_align` varchar(20)
, MODIFY COLUMN `logo_height` int(11)
, MODIFY COLUMN `logo_margin_bottom` int(11)
, MODIFY COLUMN `logo_margin_top` int(11)
, MODIFY COLUMN `logo_width` int(11);
ALTER TABLE `invoice_schemes` MODIFY COLUMN `prefix` varchar(191)
, MODIFY COLUMN `start_number` int(11)
, MODIFY COLUMN `total_digits` int(11)
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp;
ALTER TABLE `leave_requests` MODIFY COLUMN `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending';
ALTER TABLE `pump_operator_assignments` DROP COLUMN `shfit_number`
, MODIFY COLUMN `date_and_time` timestamp
, MODIFY COLUMN `close_date_and_time` timestamp
, MODIFY COLUMN `status` enum('open','close') NOT NULL DEFAULT 'open'
, MODIFY COLUMN `settlement_id` int(10) unsigned
, MODIFY COLUMN `assigned_by` int(11)
, MODIFY COLUMN `confirmed_at` timestamp
, MODIFY COLUMN `pump_operator_other_sale_id` int(11)
, MODIFY COLUMN `shift_id` int(11);
ALTER TABLE `pump_operator_payments` MODIFY COLUMN `business_id` int(10) unsigned
, MODIFY COLUMN `pump_operator_id` int(10) unsigned
, MODIFY COLUMN `note` text
, MODIFY COLUMN `edited_by` int(10) unsigned
, MODIFY COLUMN `deleted_at` timestamp
, MODIFY COLUMN `settlement_no` varchar(30)
, MODIFY COLUMN `parent_id` int(11)
, MODIFY COLUMN `shift_id` int(11);
ALTER TABLE `repair_device_models` MODIFY COLUMN `repair_checklist` text
, MODIFY COLUMN `brand_id` int(10) unsigned
, MODIFY COLUMN `device_id` int(10) unsigned
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp;
ALTER TABLE `repair_statuses` MODIFY COLUMN `color` varchar(191)
, MODIFY COLUMN `sort_order` int(11)
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `email_body` text
, MODIFY COLUMN `email_subject` text
, MODIFY COLUMN `sms_template` text;
ALTER TABLE `transactions` MODIFY COLUMN `location_id` int(10) unsigned
, MODIFY COLUMN `res_table_id` int(10) unsigned
, MODIFY COLUMN `res_waiter_id` int(10) unsigned
, MODIFY COLUMN `res_order_status` enum('received','cooked','served')
, MODIFY COLUMN `type` varchar(255)
, MODIFY COLUMN `store_id` int(11)
, MODIFY COLUMN `sub_type` varchar(20)
, MODIFY COLUMN `need_to_reserve` enum('yes','no')
, MODIFY COLUMN `credit_sale_id` int(10)
, MODIFY COLUMN `approved_user` int(10) unsigned
, MODIFY COLUMN `requested_by` int(10) unsigned
, MODIFY COLUMN `order_no` varchar(191)
, MODIFY COLUMN `order_date` varchar(191)
, MODIFY COLUMN `customer_ref` varchar(191)
, MODIFY COLUMN `order_status` varchar(191)
, MODIFY COLUMN `payment_status` enum('paid','due','partial','pending','price_later')
, MODIFY COLUMN `adjustment_type` enum('normal','abnormal')
, MODIFY COLUMN `stock_adjustment_type` varchar(20)
, MODIFY COLUMN `contact_id` int(11) unsigned
, MODIFY COLUMN `pump_operator_id` int(10) unsigned
, MODIFY COLUMN `customer_group_id` int(11)
, MODIFY COLUMN `invoice_no` varchar(191)
, MODIFY COLUMN `purchase_entry_no` varchar(191)
, MODIFY COLUMN `deed_no` varchar(191)
, MODIFY COLUMN `deed_date` date
, MODIFY COLUMN `ref_no` varchar(191)
, MODIFY COLUMN `subscription_no` varchar(191)
, MODIFY COLUMN `invoice_date` date
, MODIFY COLUMN `total_before_tax` decimal(22,6)
, MODIFY COLUMN `tax_id` int(10) unsigned
, MODIFY COLUMN `discount_type` enum('fixed','percentage')
, MODIFY COLUMN `shipping_details` varchar(191)
, MODIFY COLUMN `shipping_address` text
, MODIFY COLUMN `shipping_status` varchar(191)
, MODIFY COLUMN `delivered_to` varchar(191)
, MODIFY COLUMN `additional_notes` text
, MODIFY COLUMN `staff_note` text
, MODIFY COLUMN `expense_category_id` int(10) unsigned
, MODIFY COLUMN `expense_for` int(10) unsigned
, MODIFY COLUMN `fleet_id` int(10) unsigned
, MODIFY COLUMN `property_id` int(10) unsigned
, MODIFY COLUMN `expense_account` int(10) unsigned
, MODIFY COLUMN `controller_account` int(10) unsigned
, MODIFY COLUMN `commission_agent` int(11)
, MODIFY COLUMN `document` varchar(191)
, MODIFY COLUMN `total_amount_recovered` decimal(22,6)
, MODIFY COLUMN `transfer_parent_id` int(11)
, MODIFY COLUMN `return_parent_id` int(11)
, MODIFY COLUMN `pos_invoice_return` varchar(191)
, MODIFY COLUMN `opening_stock_product_id` int(11)
, MODIFY COLUMN `import_batch` int(11)
, MODIFY COLUMN `import_time` datetime
, MODIFY COLUMN `types_of_service_id` int(11)
, MODIFY COLUMN `packing_charge` decimal(22,6)
, MODIFY COLUMN `packing_charge_type` enum('fixed','percent')
, MODIFY COLUMN `service_custom_field_1` text
, MODIFY COLUMN `service_custom_field_2` text
, MODIFY COLUMN `service_custom_field_3` text
, MODIFY COLUMN `service_custom_field_4` text
, MODIFY COLUMN `mfg_parent_production_purchase_id` int(11)
, MODIFY COLUMN `mfg_wasted_units` decimal(20,6)
, MODIFY COLUMN `from_store` int(11)
, MODIFY COLUMN `order_addresses` text
, MODIFY COLUMN `recur_interval` double(22,4)
, MODIFY COLUMN `recur_interval_type` enum('days','months','years')
, MODIFY COLUMN `recur_repetitions` int(11)
, MODIFY COLUMN `recur_stopped_on` datetime
, MODIFY COLUMN `recur_parent_id` int(11)
, MODIFY COLUMN `invoice_token` varchar(191)
, MODIFY COLUMN `pay_term_number` int(11)
, MODIFY COLUMN `pay_term_type` enum('days','months')
, MODIFY COLUMN `selling_price_group_id` int(11)
, MODIFY COLUMN `deleted_by` int(10) unsigned
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `deleted_at` timestamp
, MODIFY COLUMN `repair_brand_id` int(11)
, MODIFY COLUMN `repair_checklist` text
, MODIFY COLUMN `repair_completed_on` datetime
, MODIFY COLUMN `repair_defects` text
, MODIFY COLUMN `repair_device_id` int(11)
, MODIFY COLUMN `repair_due_date` datetime
, MODIFY COLUMN `repair_model_id` int(11)
, MODIFY COLUMN `repair_security_pattern` varchar(191)
, MODIFY COLUMN `repair_security_pwd` varchar(191)
, MODIFY COLUMN `repair_serial_no` varchar(191)
, MODIFY COLUMN `repair_status_id` int(11)
, MODIFY COLUMN `repair_warranty_id` int(11)
, MODIFY COLUMN `subscription_repeat_on` varchar(191)
, MODIFY COLUMN `repair_job_sheet_id` int(10) unsigned
, MODIFY COLUMN `finance_option_id` int(10)
, MODIFY COLUMN `discount_acc_id` int(11) unsigned
, MODIFY COLUMN `parent_transaction_id` int(11)
, MODIFY COLUMN `transaction_note` text
, MODIFY COLUMN `new_deleted_at` timestamp
, MODIFY COLUMN `new_deleted_by` int(11)
, MODIFY COLUMN `acc_sub_type_id` int(11) unsigned
, MODIFY COLUMN `acc_type_id` int(11) unsigned;
ALTER TABLE `users` MODIFY COLUMN `surname` char(10)
, MODIFY COLUMN `last_name` varchar(191)
, MODIFY COLUMN `email` varchar(191)
, MODIFY COLUMN `language` char(7) NOT NULL DEFAULT 'en'
, MODIFY COLUMN `contact_no` char(15)
, MODIFY COLUMN `address` text
, MODIFY COLUMN `remember_token` varchar(100)
, MODIFY COLUMN `business_id` int(10) unsigned
, MODIFY COLUMN `status` enum('active','inactive','terminated') NOT NULL DEFAULT 'active'
, MODIFY COLUMN `crm_contact_id` int(10) unsigned
, MODIFY COLUMN `commission_type` varchar(191)
, MODIFY COLUMN `cmmsn_application` varchar(50)
, MODIFY COLUMN `cmmsn_units` varchar(191)
, MODIFY COLUMN `dob` date
, MODIFY COLUMN `marital_status` enum('married','unmarried','divorced')
, MODIFY COLUMN `blood_group` char(10)
, MODIFY COLUMN `contact_number` char(20)
, MODIFY COLUMN `contact_number_code` int(11)
, MODIFY COLUMN `fb_link` varchar(191)
, MODIFY COLUMN `twitter_link` varchar(191)
, MODIFY COLUMN `social_media_1` varchar(191)
, MODIFY COLUMN `social_media_2` varchar(191)
, MODIFY COLUMN `permanent_address` text
, MODIFY COLUMN `current_address` text
, MODIFY COLUMN `guardian_name` varchar(191)
, MODIFY COLUMN `custom_field_1` varchar(191)
, MODIFY COLUMN `custom_field_2` varchar(191)
, MODIFY COLUMN `custom_field_3` varchar(191)
, MODIFY COLUMN `custom_field_4` varchar(191)
, MODIFY COLUMN `bank_details` longtext
, MODIFY COLUMN `id_proof_name` varchar(191)
, MODIFY COLUMN `id_proof_number` varchar(191)
, MODIFY COLUMN `crm_department` varchar(255)
, MODIFY COLUMN `crm_designation` varchar(255)
, MODIFY COLUMN `user_store` text
, MODIFY COLUMN `pump_operator_passcode` varchar(191)
, MODIFY COLUMN `property_user_passcode` varchar(191)
, MODIFY COLUMN `give_away_gifts` varchar(191)
, MODIFY COLUMN `employee_id` int(5)
, MODIFY COLUMN `deleted_at` timestamp
, MODIFY COLUMN `created_at` timestamp
, MODIFY COLUMN `updated_at` timestamp
, MODIFY COLUMN `max_sales_discount_percent` decimal(15,2)
, MODIFY COLUMN `designation` varchar(190)
, MODIFY COLUMN `profile_photo` varchar(45);
