<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
use N1coode\NjPage\Service\Constants as Constants;

$nj_ext_key			= Constants::NJ_EXT_KEY;
$nj_ext_namespace	= Constants::NJ_EXT_NAMESPACE;
$nj_ext_path		= Constants::NJ_EXT_PATH;
$nj_ext_title		= Constants::NJ_EXT_TITLE;

$nj_ext_lang_file	= Constants::NJ_EXT_LANG_FILE_BACKEND;

$nj_domain = 'pages';


$tcaPagesStyle = [
	'tx_njpage_class_enable' => [
		'displayCond' => 'FIELD:sys_language_uid:<=:0',
		'exclude' => 0,
		'change' => 'reload',
		'label'   => $nj_ext_lang_file.'label.general.classEnable',
		'config'  => [
			'type' => 'check'
		]
	],
	'tx_njpage_class' => [
		'displayCond' => [
			'AND' => ['FIELD:sys_language_uid:<=:0','FIELD:tx_njpage_class_enable:=:1']
		],
		'exclude' => 0,
		'label' => $nj_ext_lang_file.'label.general.class',
		'config'  => [
			'type' => 'input',
			'size' => 25,
			'eval' => 'trim',
			'max'  => 256
		]
	],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$tcaPagesStyle);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay',$tcaPagesStyle);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'pages',
	'tx_njpage_class',
	'tx_njpage_class_enable,tx_njpage_class'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'pages_language_overlay',
	'tx_njpage_class',
	'tx_njpage_class_enable,tx_njpage_class'
);



$addFieldsPages .= '--div--;';
$addFieldsPages .= $nj_ext_lang_file.'tab.general,';
$addFieldsPages .= '--palette--;;tx_njpage_class,';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages',$addFieldsPages);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay',$addFieldsPages);

$requestUpdateFields = 'tx_njpage_class_enable';
$GLOBALS['TCA']['pages']['ctrl']['requestUpdate'] = $TCA['pages']['ctrl']['requestUpdate'] ? $TCA['pages']['ctrl']['requestUpdate'] . ',' . $requestUpdateFields : $requestUpdateFields;
$GLOBALS['TCA']['pages_language_overlay']['ctrl']['requestUpdate'] = $TCA['pages_language_overlay']['ctrl']['requestUpdate'] ? $TCA['pages_language_overlay']['ctrl']['requestUpdate'] . ',' . $requestUpdateFields : $requestUpdateFields;