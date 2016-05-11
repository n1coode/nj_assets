<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
use N1coode\NjPage\Service\Constants as Constants;

$nj_ext_key			= Constants::NJ_EXT_KEY;
$nj_ext_namespace	= Constants::NJ_EXT_NAMESPACE;
$nj_ext_path		= Constants::NJ_EXT_PATH;
$nj_ext_title		= Constants::NJ_EXT_TITLE;

$nj_ext_lang_file	= Constants::NJ_EXT_LANG_FILE_BACKEND;
$nj_domain			= 'tt_content';

$tcaContentDevice = [
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

$tcaContentStyle = [
	'tx_njpage_alignment' => [
		'displayCond' => 'FIELD:sys_language_uid:<=:0',
		'exclude' => 0,
		'label' => $nj_ext_lang_file.'label.'.$nj_domain.'.alignment',
		'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
					[$nj_ext_lang_file.'select.'.$nj_domain.'.alignment.left', 'left'],
					[$nj_ext_lang_file.'select.'.$nj_domain.'.alignment.center', 'center'],
					[$nj_ext_lang_file.'select.'.$nj_domain.'.alignment.right', 'right'],
					[$nj_ext_lang_file.'select.'.$nj_domain.'.alignment.justify', 'justify'],
			],
			'default' => 0,
			'maxitems' => 1
		]
	],
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
	$tcaContentDevice
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'tt_content',
	$tcaContentStyle
);

$addContentFields .= '--div--;';
$addContentFields .= $nj_ext_lang_file.'tab.general.design,';
$addContentFields .= 'tx_njpage_render_type,tx_njpage_alignment,';
$addContentFields .= '--palette--;;tx_njpage_bgcolor,';
$addContentFields .= '--palette--;;tx_njpage_class,';
$addContentFields .= '--palette--;;tx_njpage_style,';
$addContentFields .= 'tx_njpage_wrap_enable,tx_njpage_wrap_disable_overall,';
$addContentFields .= '--div--;';
$addContentFields .= $nj_ext_lang_file.'tab.'.$nj_domain.'.mobile,';
$addContentFields .= 'tx_njpage_device_enable,tx_njpage_device_selection,tx_njpage_device,';
$addContentFields .= '--palette--;;tx_njpage_orientation,';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'tt_content',
	$addContentFields
);

$requestUpdateFields = 'tx_njpage_bgcolor_enable,tx_njpage_class_enable,tx_njpage_device_enable,tx_njpage_style_enable,tx_njpage_wrap_disable_overall';
$GLOBALS['TCA']['tt_content']['ctrl']['requestUpdate'] = $TCA['tt_content']['ctrl']['requestUpdate'] ? $TCA['tt_content']['ctrl']['requestUpdate'] . ',' . $requestUpdateFields : $requestUpdateFields;