<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
use N1coode\NjPage\Service\Constants as Constants;

$nj_ext_key			= Constants::NJ_EXT_KEY;
$nj_ext_namespace	= Constants::NJ_EXT_NAMESPACE;
$nj_ext_path		= Constants::NJ_EXT_PATH;
$nj_ext_title		= Constants::NJ_EXT_TITLE;

$nj_ext_lang_file	= Constants::NJ_EXT_LANG_FILE_BACKEND;

$nj_domain = 'tt_content';


$tcaDevice = [
	'tx_njpage_device' => [
		'displayCond' => [
			'AND' => ['FIELD:sys_language_uid:<=:0','FIELD:tx_njpage_device_enable:=:1']
		],
		'exclude' => 0,
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.device',
		'config'  => [
			'type' => 'input',
			'size' => 15,
			'max'  => 25
		]
    ],
	'tx_njpage_device_enable' => [
		'displayCond' => 'FIELD:sys_language_uid:<=:0',
		'exclude' => 0,
		'change' => 'reload',
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.deviceEnable',
		'config'  => [
			'type' => 'check'
		]
	],
	'tx_njpage_device_selection' => [
		'displayCond' => [
			'AND' => ['FIELD:sys_language_uid:<=:0','FIELD:tx_njpage_device_enable:=:1']
		],
		'exclude' => 0,
		'label' => '',
		'config' => [
			'type' => 'user',
			'userFunc' => 'N1coode\NjPage\Utility\Tca->deviceSelection',
			'parameters' => []
		]
	],
	'tx_njpage_orientation' => [
		'exclude' => 0,
		'displayCond' => [
			'AND' => ['FIELD:sys_language_uid:<=:0','FIELD:tx_njpage_device_enable:=:1']
		],
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.orientation',
		'config'  => [
			'type' => 'input',
			'size' => 20,
			'eval' => 'trim',
			'max'  => 255
		]
    ],
	'tx_njpage_orientation_enable' => [
		'exclude' => 0,
		'displayCond' => [
			'AND' => ['FIELD:sys_language_uid:<=:0','FIELD:tx_njpage_device_enable:=:1']
		],
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.orientationEnable',
		'config'  => [
			'type' => 'check'
		]
	],
];

$tcaStyle = [
	'tx_njpage_alignment' => [
		'displayCond' => 'FIELD:sys_language_uid:<=:0',
		'exclude' => 0,
		'label' => $nj_ext_lang_file.'label.'.$nj_domain.'.alignment',
		'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
					[$nj_ext_lang_file.'select.'.$nj_domain.'.alignment.left', 0],
					[$nj_ext_lang_file.'select.'.$nj_domain.'.alignment.center', 1],
					[$nj_ext_lang_file.'select.'.$nj_domain.'.alignment.right', 2],
					[$nj_ext_lang_file.'select.'.$nj_domain.'.alignment.justify', 3],
			],
			'default' => 0,
			'maxitems' => 1
		]
	],
	'tx_njpage_class_enable' => [
		'displayCond' => 'FIELD:sys_language_uid:<=:0',
		'exclude' => 0,
		'change' => 'reload',
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.classEnable',
		'config'  => [
			'type' => 'check'
		]
	],
	'tx_njpage_class' => [
		'displayCond' => [
			'AND' => ['FIELD:sys_language_uid:<=:0','FIELD:tx_njpage_class_enable:=:1']
		],
		'exclude' => 0,
		'label' => $nj_ext_lang_file.'label.'.$nj_domain.'.class',
		'config'  => [
			'type' => 'input',
			'size' => 25,
			'eval' => 'trim',
			'max'  => 256
		]
	],
	'tx_njpage_render_type' => [
		'displayCond' => 'FIELD:sys_language_uid:<=:0',
		'exclude' => 0,
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.renderType',
		'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
					['article', 'article'],
					['div', 'div'],
					['section', 'section'],
			],
			'default' => 'article',
			'maxitems' => 1
		]
	],
	'tx_njpage_style_enable' => [
		'displayCond' => 'FIELD:sys_language_uid:<=:0',
		'exclude' => 0,
		'change' => 'reload',
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.styleEnable',
		'config'  => [
			'type' => 'check'
		]
	],
	'tx_njpage_style' => [
		'displayCond' => [
			'AND' => ['FIELD:sys_language_uid:<=:0','FIELD:tx_njpage_style_enable:=:1']
		],
		'exclude' => 0,
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.style',
		'config'  => [
			'type' => 'input',
			'size' => 25,
			'eval' => 'trim',
			'max'  => 256
		]
	],
	'tx_njpage_wrap_disable_overall' => [
		'displayCond' => 'FIELD:sys_language_uid:<=:0',
		'exclude' => 0,
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.wrapDisable',
		'change' => 'reload',
		'config'  => [
			'type' => 'check'
		]
	],
	'tx_njpage_wrap_enable' => [
		'displayCond' => [
			'AND' => ['FIELD:sys_language_uid:<=:0','FIELD:tx_njpage_wrap_disable_overall:<=:0']
		],
		'exclude' => 0,
		'label'   => $nj_ext_lang_file.'label.'.$nj_domain.'.wrapEnable',
		'config'  => [
			'type' => 'check'
		]
	],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'tt_content',
	'tx_njpage_class',
	'tx_njpage_class_enable,tx_njpage_class'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'tt_content',
	'tx_njpage_style',
	'tx_njpage_style_enable,tx_njpage_style'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'tt_content',
	'tx_njpage_orientation',
	'tx_njpage_orientation_enable,tx_njpage_orientation'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'tt_content',
	$tcaDevice
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'tt_content',
	$tcaStyle
);

$addFields .= '--div--;';
$addFields .= $nj_ext_lang_file.'tab.'.$nj_domain.'.design,';
$addFields .= 'tx_njpage_render_type,tx_njpage_alignment,';
$addFields .= '--palette--;;tx_njpage_bgcolor,';
$addFields .= '--palette--;;tx_njpage_class,';
$addFields .= '--palette--;;tx_njpage_style,';
$addFields .= 'tx_njpage_wrap_enable,tx_njpage_wrap_disable_overall,';
$addFields .= '--div--;';
$addFields .= $nj_ext_lang_file.'tab.'.$nj_domain.'.mobile,';
$addFields .= 'tx_njpage_device_enable,tx_njpage_device_selection,tx_njpage_device,';
$addFields .= '--palette--;;tx_njpage_orientation,';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'tt_content',
	$addFields
);

$requestUpdateFields = 'tx_njpage_bgcolor_enable,tx_njpage_class_enable,tx_njpage_device_enable,tx_njpage_style_enable,tx_njpage_wrap_disable_overall';
$GLOBALS['TCA']['tt_content']['ctrl']['requestUpdate'] = $TCA['tt_content']['ctrl']['requestUpdate'] ? $TCA['tt_content']['ctrl']['requestUpdate'] . ',' . $requestUpdateFields : $requestUpdateFields;