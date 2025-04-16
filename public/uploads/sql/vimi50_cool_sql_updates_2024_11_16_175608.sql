CREATE TABLE `myhealth_specializations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
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
ALTER TABLE `business` ADD COLUMN `sms_non_delivery` int(11) AFTER `day_end_enable`
, MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `last_sms_notification` int(11)
, MODIFY COLUMN `currency_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `is_manged_stock_enable` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `day_end` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `day_end_enable` int(11)
, MODIFY COLUMN `default_sales_tax` int(10) unsigned
, MODIFY COLUMN `owner_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `fy_start_month` tinyint(4) NOT NULL DEFAULT '1'
, MODIFY COLUMN `stop_selling_before` int(11) NOT NULL
, MODIFY COLUMN `purchase_currency_id` int(10) unsigned
, MODIFY COLUMN `transaction_edit_days` int(10) unsigned NOT NULL DEFAULT '30'
, MODIFY COLUMN `stock_expiry_alert_days` int(10) unsigned NOT NULL DEFAULT '30'
, MODIFY COLUMN `default_unit` int(11)
, MODIFY COLUMN `created_by` int(11)
, MODIFY COLUMN `max_rp_per_order` int(11)
, MODIFY COLUMN `min_redeem_point` int(11)
, MODIFY COLUMN `max_redeem_point` int(11)
, MODIFY COLUMN `rp_expiry_period` int(11)
, MODIFY COLUMN `default_store` int(11)
, MODIFY COLUMN `patient_details_id` int(11)
, MODIFY COLUMN `customer_interest_deduct_option` tinyint(4) NOT NULL DEFAULT '0'
, MODIFY COLUMN `customer_interest_deduct` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `duplicate_orders_allowed` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `font_size` int(11) NOT NULL;
ALTER TABLE `business_locations` ADD COLUMN `district` varchar(100) AFTER `currency_id`
, MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `invoice_scheme_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `invoice_layout_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `selling_price_group_id` int(11)
, MODIFY COLUMN `printer_id` int(11)
, MODIFY COLUMN `currency_id` bigint(20) DEFAULT '111';
ALTER TABLE `cash_register_transactions` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `cash_register_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `transaction_id` int(11);
ALTER TABLE `categories` DROP COLUMN `active`
, DROP COLUMN `category_order`
, DROP COLUMN `has_ticket`
, DROP COLUMN `is_featured`
, DROP COLUMN `thumbnail`
, MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `parent_id` int(11) NOT NULL
, MODIFY COLUMN `default_product_category_id` bigint(10) unsigned
, MODIFY COLUMN `cogs_account_id` int(10)
, MODIFY COLUMN `sales_income_account_id` int(10)
, MODIFY COLUMN `weight_loss_expense_account_id` int(10) unsigned
, MODIFY COLUMN `weight_excess_income_account_id` int(10) unsigned
, MODIFY COLUMN `created_by` int(10) unsigned NOT NULL
, MODIFY COLUMN `price_increment_acc` int(11)
, MODIFY COLUMN `price_reduction_acc` int(11)
, MODIFY COLUMN `vat_not_applicable` int(11) NOT NULL;
ALTER TABLE `chequer_currencies` DROP COLUMN `test`;
ALTER TABLE `chequer_default_settings` MODIFY COLUMN `id` int(11) NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `def_status` int(11) NOT NULL DEFAULT '1'
, MODIFY COLUMN `def_cheque_templete` int(11) NOT NULL
, MODIFY COLUMN `def_autostart_chbk_no` int(11)
, MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT 'current_timestamp()';
ALTER TABLE `chequer_purchase_orders` MODIFY COLUMN `id` int(11) NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `total_items` int(11) NOT NULL
, MODIFY COLUMN `supplier_id` int(11) NOT NULL
, MODIFY COLUMN `outlet_id` int(11) NOT NULL
, MODIFY COLUMN `warehouse_id` int(100) NOT NULL
, MODIFY COLUMN `payment_method` int(11) NOT NULL
, MODIFY COLUMN `created_user_id` int(11) NOT NULL
, MODIFY COLUMN `updated_user_id` int(11) NOT NULL
, MODIFY COLUMN `received_user_id` int(11) NOT NULL
, MODIFY COLUMN `status` int(11) NOT NULL
, MODIFY COLUMN `vt_status` int(1) NOT NULL
, MODIFY COLUMN `refund_status` int(1) NOT NULL
, MODIFY COLUMN `pid` int(11) NOT NULL
, MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT 'current_timestamp()';
ALTER TABLE `chequer_stamps` MODIFY COLUMN `id` int(11) NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `stamp_status` int(11) NOT NULL DEFAULT '1'
, MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT 'current_timestamp()';
ALTER TABLE `chequer_suppliers` MODIFY COLUMN `id` int(11) NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `created_user_id` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `updated_user_id` int(11)
, MODIFY COLUMN `status` int(1) NOT NULL DEFAULT '0'
, MODIFY COLUMN `isPayee` int(11)
, MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT 'current_timestamp()';
ALTER TABLE `contact_groups` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `supplier_group_id` int(11)
, MODIFY COLUMN `created_by` int(10) unsigned NOT NULL
, MODIFY COLUMN `account_type_id` int(11)
, MODIFY COLUMN `interest_account_id` int(11);
ALTER TABLE `contacts` ADD COLUMN `sms_group_id` int(11) NOT NULL AFTER `sub_customer`
, MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `opening_balance` int(50) DEFAULT '0'
, MODIFY COLUMN `pay_term_number` int(11)
, MODIFY COLUMN `created_by` int(10) unsigned NOT NULL
, MODIFY COLUMN `converted_by` int(11)
, MODIFY COLUMN `total_rp` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `total_rp_used` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `total_rp_expired` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `customer_group_id` int(11)
, MODIFY COLUMN `supplier_group_id` int(10) unsigned
, MODIFY COLUMN `temp_approved_user` int(10)
, MODIFY COLUMN `temp_requested_by` int(10) unsigned
, MODIFY COLUMN `should_notify` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `user_id` int(11)
, MODIFY COLUMN `sub_customer` int(11) NOT NULL DEFAULT '0';
ALTER TABLE `countries` MODIFY COLUMN `id` int(5) NOT NULL;
ALTER TABLE `gold_grades` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `created_by` int(10) unsigned NOT NULL
, MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT 'current_timestamp()';
ALTER TABLE `invoice_layouts` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `font_size` int(11)
, MODIFY COLUMN `business_name_font_size` int(11)
, MODIFY COLUMN `invoice_heading_font_size` int(11)
, MODIFY COLUMN `header_font_size` int(11)
, MODIFY COLUMN `footer_font_size` int(11)
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `logo_height` int(11)
, MODIFY COLUMN `logo_margin_bottom` int(11)
, MODIFY COLUMN `logo_margin_top` int(11)
, MODIFY COLUMN `logo_width` int(11)
, MODIFY COLUMN `is_system` int(11) NOT NULL DEFAULT '0';
ALTER TABLE `invoice_schemes` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `start_number` int(11)
, MODIFY COLUMN `invoice_count` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `total_digits` int(11);
ALTER TABLE `leave_requests` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `employee_id` int(10) NOT NULL
, MODIFY COLUMN `leave_type_id` int(10) NOT NULL
, MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `attended_by` int(10) unsigned NOT NULL;
ALTER TABLE `pump_operator_assignments` DROP COLUMN `shfit_number`
, MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `pump_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `pump_operator_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `settlement_id` int(10) unsigned
, MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `assigned_by` int(11)
, MODIFY COLUMN `is_confirmed` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `is_manually_closed` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `pump_operator_other_sale_id` int(11)
, MODIFY COLUMN `closed_in_settlement` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `shift_id` int(11)
, MODIFY COLUMN `shift_number` int(11) NOT NULL DEFAULT '0';
ALTER TABLE `pump_operator_payments` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned
, MODIFY COLUMN `date_and_time` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `pump_operator_id` int(10) unsigned
, MODIFY COLUMN `edited_by` int(10) unsigned
, MODIFY COLUMN `created_by` int(10) unsigned NOT NULL
, MODIFY COLUMN `created_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `updated_at` timestamp NOT NULL DEFAULT 'current_timestamp()'
, MODIFY COLUMN `is_used` int(11) DEFAULT '0'
, MODIFY COLUMN `parent_id` int(11)
, MODIFY COLUMN `shift_id` int(11);
ALTER TABLE `repair_device_models` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `brand_id` int(10) unsigned
, MODIFY COLUMN `device_id` int(10) unsigned
, MODIFY COLUMN `created_by` int(10) unsigned NOT NULL;
ALTER TABLE `repair_statuses` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `sort_order` int(11)
, MODIFY COLUMN `business_id` int(11) NOT NULL;
ALTER TABLE `transactions` MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned NOT NULL
, MODIFY COLUMN `location_id` int(10) unsigned
, MODIFY COLUMN `res_table_id` int(10) unsigned
, MODIFY COLUMN `res_waiter_id` int(10) unsigned
, MODIFY COLUMN `store_id` int(11)
, MODIFY COLUMN `credit_sale_id` int(10)
, MODIFY COLUMN `approved_user` int(10) unsigned
, MODIFY COLUMN `requested_by` int(10) unsigned
, MODIFY COLUMN `contact_id` int(11) unsigned
, MODIFY COLUMN `pump_operator_id` int(10) unsigned
, MODIFY COLUMN `customer_group_id` int(11)
, MODIFY COLUMN `tax_id` int(10) unsigned
, MODIFY COLUMN `rp_redeemed` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `expense_category_id` int(10) unsigned
, MODIFY COLUMN `expense_for` int(10) unsigned
, MODIFY COLUMN `fleet_id` int(10) unsigned
, MODIFY COLUMN `property_id` int(10) unsigned
, MODIFY COLUMN `expense_account` int(10) unsigned
, MODIFY COLUMN `controller_account` int(10) unsigned
, MODIFY COLUMN `commission_agent` int(11)
, MODIFY COLUMN `transfer_parent_id` int(11)
, MODIFY COLUMN `return_parent_id` int(11)
, MODIFY COLUMN `opening_stock_product_id` int(11)
, MODIFY COLUMN `created_by` int(10) unsigned NOT NULL
, MODIFY COLUMN `import_batch` int(11)
, MODIFY COLUMN `types_of_service_id` int(11)
, MODIFY COLUMN `mfg_parent_production_purchase_id` int(11)
, MODIFY COLUMN `rp_earned` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `from_store` int(11)
, MODIFY COLUMN `recur_repetitions` int(11)
, MODIFY COLUMN `recur_parent_id` int(11)
, MODIFY COLUMN `pay_term_number` int(11)
, MODIFY COLUMN `selling_price_group_id` int(11)
, MODIFY COLUMN `deleted_by` int(10) unsigned
, MODIFY COLUMN `repair_brand_id` int(11)
, MODIFY COLUMN `repair_device_id` int(11)
, MODIFY COLUMN `repair_model_id` int(11)
, MODIFY COLUMN `repair_status_id` int(11)
, MODIFY COLUMN `repair_warranty_id` int(11)
, MODIFY COLUMN `repair_job_sheet_id` int(10) unsigned
, MODIFY COLUMN `finance_option_id` int(10)
, MODIFY COLUMN `balance_quantity` text NOT NULL DEFAULT ''0''
, MODIFY COLUMN `From_Account` int(11) NOT NULL DEFAULT '1'
, MODIFY COLUMN `To_Account` int(11) NOT NULL DEFAULT '1'
, MODIFY COLUMN `discount_acc_id` int(11) unsigned
, MODIFY COLUMN `reprint_no` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `is_post_dated_cheques` int(1) NOT NULL DEFAULT '0'
, MODIFY COLUMN `parent_transaction_id` int(11)
, MODIFY COLUMN `is_vat` int(11) NOT NULL DEFAULT '0'
, MODIFY COLUMN `transaction_updated` int(11) NOT NULL DEFAULT '1'
, MODIFY COLUMN `overpayment_setoff` int(11) DEFAULT '0'
, MODIFY COLUMN `new_deleted_by` int(11)
, MODIFY COLUMN `acc_sub_type_id` int(11) unsigned
, MODIFY COLUMN `acc_type_id` int(11) unsigned;
ALTER TABLE `users` DROP COLUMN `CURRENT_CONNECTIONS`
, DROP COLUMN `MAX_SESSION_CONTROLLED_MEMORY`
, DROP COLUMN `MAX_SESSION_TOTAL_MEMORY`
, DROP COLUMN `TOTAL_CONNECTIONS`
, DROP COLUMN `USER`
, DROP COLUMN `avatar`
, DROP COLUMN `country`
, DROP COLUMN `email_verified_at`
, DROP COLUMN `envato_username`
, DROP COLUMN `last_login_at`
, DROP COLUMN `last_login_ip`
, DROP COLUMN `locale`
, DROP COLUMN `name`
, DROP COLUMN `notes`
, DROP COLUMN `signature`
, MODIFY COLUMN `id` int(10) unsigned NOT NULL
, MODIFY COLUMN `business_id` int(10) unsigned
, MODIFY COLUMN `crm_contact_id` int(10) unsigned
, MODIFY COLUMN `contact_number_code` int(11)
, MODIFY COLUMN `pump_operator_id` int(10) unsigned NOT NULL DEFAULT '0'
, MODIFY COLUMN `employee_id` int(5)
, MODIFY COLUMN `pump_operator_pass_changed` int(11) NOT NULL DEFAULT '0';
