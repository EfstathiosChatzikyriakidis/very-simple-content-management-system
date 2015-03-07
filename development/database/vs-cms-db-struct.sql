CREATE TABLE `adjust_info` (
   id int(10) unsigned NOT NULL auto_increment,
   client_email_address longtext NOT NULL,
   develo_email_address longtext NOT NULL,
   client_email_nospam longtext NOT NULL,
   develo_email_nospam longtext NOT NULL,
   holy_host_name longtext NOT NULL,
   holy_port_number int(10) unsigned DEFAULT '0' NOT NULL,
   holy_repeat_number int(10) unsigned DEFAULT '0' NOT NULL,
   top_center_item_title longtext NOT NULL,
   left_column_title longtext NOT NULL,
   main_column_title longtext NOT NULL,
   text_links_number int(10) unsigned DEFAULT '0' NOT NULL,
   graphic_links_number int(10) unsigned DEFAULT '0' NOT NULL,
   graphic_links_cols int(10) unsigned DEFAULT '0' NOT NULL,
   banner_links_number int(10) unsigned DEFAULT '0' NOT NULL,
   banner_links_cols int(10) unsigned DEFAULT '0' NOT NULL,
   main_column_welcome longtext NOT NULL,
   content_days_new int(10) DEFAULT '0' NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `banner_links` (
   id int(10) unsigned NOT NULL auto_increment,
   url longtext NOT NULL,
   graphic longtext NOT NULL,
   title longtext NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `components_status` (
   id int(10) unsigned NOT NULL auto_increment,
   comp_name text NOT NULL,
   comp_status int(10) unsigned DEFAULT '0' NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `content_categories` (
   cat_id int(10) unsigned NOT NULL auto_increment,
   cat_pid int(10) unsigned DEFAULT '0' NOT NULL,
   cat_name longtext NOT NULL,
   cat_graphic longtext NOT NULL,
   cat_description longtext NOT NULL,
   cat_visibility tinyint(1) unsigned DEFAULT '1' NOT NULL,
   PRIMARY KEY (cat_id)
);

CREATE TABLE `content_items` (
   con_id int(10) unsigned NOT NULL auto_increment,
   cat_id int(10) unsigned DEFAULT '0' NOT NULL,
   con_graphic longtext NOT NULL,
   con_base_title longtext NOT NULL,
   con_des_title longtext NOT NULL,
   con_text longtext NOT NULL,
   con_hits int(10) unsigned DEFAULT '0' NOT NULL,
   con_visibility tinyint(1) unsigned DEFAULT '1' NOT NULL,
   con_date date DEFAULT '0000-00-00' NOT NULL,
   con_time time DEFAULT '00:00:00' NOT NULL,
   con_change_date date DEFAULT '0000-00-00' NOT NULL,
   con_change_time time DEFAULT '00:00:00' NOT NULL,
   PRIMARY KEY (con_id)
);

CREATE TABLE `corner_items` (
   id int(10) unsigned NOT NULL auto_increment,
   url longtext NOT NULL,
   graphic longtext NOT NULL,
   title longtext NOT NULL,
   valign text NOT NULL,
   align text NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `graphic_links` (
   id int(10) unsigned NOT NULL auto_increment,
   url longtext NOT NULL,
   graphic longtext NOT NULL,
   title longtext NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `ip_templates` (
   id int(10) unsigned NOT NULL auto_increment,
   ip_address longtext NOT NULL,
   template_directory longtext NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `online_users` (
   id int(10) unsigned NOT NULL auto_increment,
   ip_address longtext NOT NULL,
   last_date int(10) unsigned DEFAULT '0' NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `page_counters` (
   id int(10) unsigned NOT NULL auto_increment,
   page_path longtext NOT NULL,
   hits int(10) unsigned DEFAULT '0' NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `text_links` (
   id int(10) unsigned NOT NULL auto_increment,
   url longtext NOT NULL,
   title longtext NOT NULL,
   text longtext NOT NULL,
   PRIMARY KEY (id)
);
