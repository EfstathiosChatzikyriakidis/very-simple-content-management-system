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
INSERT INTO adjust_info VALUES (1, 'username@domain.com', 'username@domain.com', 'username@domain.com', 'username@domain.com', 'http://www.youraddress.com/', 5656, 1, 'The title of the link.', 'Content Categories.', '[ Here, you should input the message of the mainframe ]', 30, 5, 5, 4, 4, 'Here you should input your html welcome data.', -14);

CREATE TABLE `banner_links` (
   id int(10) unsigned NOT NULL auto_increment,
   url longtext NOT NULL,
   graphic longtext NOT NULL,
   title longtext NOT NULL,
   PRIMARY KEY (id)
);
INSERT INTO banner_links VALUES (1, 'http://www.webaddress.com/', 'example-banner-graphic.png', 'The title of the banner link 1.');
INSERT INTO banner_links VALUES (2, 'http://www.webaddress.com/', 'example-banner-graphic.png', 'The title of the banner link 2.');

CREATE TABLE `components_status` (
   id int(10) unsigned NOT NULL auto_increment,
   comp_name text NOT NULL,
   comp_status int(10) unsigned DEFAULT '0' NOT NULL,
   PRIMARY KEY (id)
);
INSERT INTO components_status VALUES (1, 'footer_part', 1);
INSERT INTO components_status VALUES (2, 'left_column', 1);
INSERT INTO components_status VALUES (4, 'graphic_links', 1);
INSERT INTO components_status VALUES (5, 'banner_links', 1);
INSERT INTO components_status VALUES (6, 'choose_template', 1);

CREATE TABLE `content_categories` (
   cat_id int(10) unsigned NOT NULL auto_increment,
   cat_pid int(10) unsigned DEFAULT '0' NOT NULL,
   cat_name longtext NOT NULL,
   cat_graphic longtext NOT NULL,
   cat_description longtext NOT NULL,
   cat_visibility tinyint(1) unsigned DEFAULT '1' NOT NULL,
   PRIMARY KEY (cat_id)
);
INSERT INTO content_categories VALUES (1, 0, 'The title of the category 1.', 'no', 'The description of the category 1.', 1);

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
INSERT INTO content_items VALUES (1, 1, 'no', 'The title of the content 1.', 'The description of the content 1.', 'The body text of the content 1.', 214, 1, '2007-08-27', '16:55:54', '2008-05-18', '19:09:23');
INSERT INTO content_items VALUES (2, 1, 'no', 'The title of the content 2.', 'The description of the content 2.', 'The body text of the content 2.', 215, 1, '2007-08-28', '16:55:55', '2008-05-19', '19:09:24');

CREATE TABLE `corner_items` (
   id int(10) unsigned NOT NULL auto_increment,
   url longtext NOT NULL,
   graphic longtext NOT NULL,
   title longtext NOT NULL,
   valign text NOT NULL,
   align text NOT NULL,
   PRIMARY KEY (id)
);
INSERT INTO corner_items VALUES (1, 'index.php', 'top-left-graphic.png', 'The title of the top left corner link.', 'top', 'left');
INSERT INTO corner_items VALUES (2, 'index.php', 'top-center-graphic.png', 'The title of the top center corner link.', 'top', 'center');
INSERT INTO corner_items VALUES (3, 'index.php', 'top-right-graphic.png', 'The title of the top right corner link.', 'top', 'right');

CREATE TABLE `graphic_links` (
   id int(10) unsigned NOT NULL auto_increment,
   url longtext NOT NULL,
   graphic longtext NOT NULL,
   title longtext NOT NULL,
   PRIMARY KEY (id)
);
INSERT INTO graphic_links VALUES (1, 'no', 'example-link-graphic.png', 'The title of the graphic link 1.');
INSERT INTO graphic_links VALUES (2, 'no', 'example-link-graphic.png', 'The title of the graphic link 2.');
INSERT INTO graphic_links VALUES (3, 'no', 'example-link-graphic.png', 'The title of the graphic link 3.');

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
INSERT INTO text_links VALUES (1, 'http://www.webaddress.com/', 'The title of the text link 1.', 'The text of the text link 1.');
INSERT INTO text_links VALUES (2, 'http://www.webaddress.com/', 'The title of the text link 2.', 'The text of the text link 2.');
