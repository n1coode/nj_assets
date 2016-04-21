<?php
namespace N1coode\NjPage\Controller;
use N1coode\NjPage\Service\Constants as Constants;

/**
 * Abstract controller for the extension tx_njpage
 * @author n1coo.de
 * @package nj_page
 */
class AbstractController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{	
	/**
	 * @var array 
	 */
	protected $error = [];
	
	/**
	 * @var array 
	 */
	protected $exceptions = [];
	
	/**
	 * @var string
	 */
	protected $nj_action = '';
	
	/**
	 * @var string
	 */
	protected $nj_ajax_pageType = Constants::NJ_AJAX_PAGETYPE;
	
	/**
	 * @var string
	 */
	protected  $nj_domain = '';
	
	/**
	 * @var string
	 */
	protected $nj_domain_model = '';
	
	/**
	 * @var string
	 */
	protected $nj_ext_domain = Constants::NJ_EXT_DOMAIN;
	
	/**
	 * @var string
	 */
	protected $nj_ext_key = Constants::NJ_EXT_KEY;
	
	/**
	 * @var string
	 */
	protected $nj_ext_namespace = Constants::NJ_EXT_NAMESPACE;
	
	/**
	 * @var string
	 */
	protected $nj_ext_path = Constants::NJ_EXT_PATH;

	/**
	 * @var array
	 */
	protected $nj_settings = [];
	
	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;
	
	
	/**
	 * @param string $model
	 * @throws \TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException
	 * @throws \TYPO3\CMS\Extbase\Configuration\Exception
	 */
    protected function init($model)
    {	
		
	}
}