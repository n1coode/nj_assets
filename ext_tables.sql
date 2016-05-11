#  
# Additional field for the 'pages' table
#

CREATE TABLE pages (
	nav_icon varchar(25) DEFAULT '' NOT NULL,
	nav_title_sub varchar(25) DEFAULT '' NOT NULL,
	tx_njpage_class varchar(255) DEFAULT '' NOT NULL,
	tx_njpage_class_enable tinyint(4) DEFAULT '0' NOT NULL,
);

CREATE TABLE pages_language_overlay (
	nav_icon varchar(25) DEFAULT '' NOT NULL,
	nav_title_sub varchar(25) DEFAULT '' NOT NULL,
	tx_njpage_class varchar(255) DEFAULT '' NOT NULL,
	tx_njpage_class_enable tinyint(4) DEFAULT '0' NOT NULL,
);

#  
# Additional field for the 'tt_content' table
#

CREATE TABLE tt_content (
	tx_njpage_alignment varchar(25) DEFAULT '' NOT NULL,
	tx_njpage_device_enable tinyint(4) DEFAULT '0' NOT NULL,
	tx_njpage_device varchar(255) DEFAULT '' NOT NULL,
	tx_njpage_orientation_enable tinyint(4) DEFAULT '0' NOT NULL,
	tx_njpage_orientation varchar(255) DEFAULT '' NOT NULL,
	tx_njpage_bgcolor varchar(255) DEFAULT '' NOT NULL,
	tx_njpage_bgcolor_enable tinyint(4) DEFAULT '0' NOT NULL,
	tx_njpage_class varchar(255) DEFAULT '' NOT NULL,
	tx_njpage_class_enable tinyint(4) DEFAULT '0' NOT NULL,
	tx_njpage_render_type varchar(25) DEFAULT '' NOT NULL,
	tx_njpage_style varchar(255) DEFAULT '' NOT NULL,
	tx_njpage_style_enable tinyint(4) DEFAULT '0' NOT NULL,
	tx_njpage_wrap_disable_overall tinyint(4) DEFAULT '0' NOT NULL,
	tx_njpage_wrap_enable tinyint(4) DEFAULT '0' NOT NULL,
);