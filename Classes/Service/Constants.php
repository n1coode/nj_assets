<?php
namespace N1coode\NjPage\Service;

/**
 * @author n1coode
 * @package nj_page
 */
class Constants
{ 
	const NJ_AJAX_PAGETYPE	= '6517243';
	const NJ_EXT_DOMAIN		= 'N1coode';
	const NJ_EXT_KEY        = 'tx_njpage';
	const NJ_EXT_LIST_TYPE	= 'njpage_pi1';
	const NJ_EXT_NAMESPACE	= 'NjPage';
	const NJ_EXT_PATH       = 'nj_page';
    const NJ_EXT_TITLE      = 'njs Page configuration';
	const NJ_EXT_LANG_FILE_FRONTEND	= 'LLL:EXT:nj_page/Resources/Private/Language/locallang.xlf:';
	const NJ_EXT_LANG_FILE_BACKEND	= 'LLL:EXT:nj_page/Resources/Private/Language/locallang_db.xlf:';
	
	/**
	 * @return array All constants
	 */
	public static function extValues()
	{
		return [
			'ajax'		=> [
				'pagetype' => self::NJ_AJAX_PAGETYPE,
			],
			'domain'	=> self::NJ_EXT_DOMAIN,
			'key'		=> self::NJ_EXT_KEY,
			'namespace'	=> self::NJ_EXT_NAMESPACE,
			'path'		=> self::NJ_EXT_PATH,
			'lang'		=> [
				'backend'	=> self::NJ_EXT_LANG_FILE_BACKEND,
				'frontend'	=> self::NJ_EXT_LANG_FILE_FRONTEND,
			]
		];
	}
}