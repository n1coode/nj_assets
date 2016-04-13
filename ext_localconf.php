<?php
if(!defined('TYPO3_MODE')) die ('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY] = unserialize($_EXTCONF);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'N1coode.'.$_EXTKEY,
    'Pi1',
    array(),
    // non-cacheable actions
    array()
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][$_EXTKEY] = 'EXT:nj_page/Classes/Hooks/PageLayoutView.php:N1coode\NjPage\Hooks\PageLayoutView';