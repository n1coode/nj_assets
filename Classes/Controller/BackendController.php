<?php
namespace N1coode\NjPage\Controller;

/**
 * @author n1coo.de
 * @package nj_page
 */
class BackendController extends \N1coode\NjPage\Controller\AbstractController
{
	
	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	public $configurationManager;
	
	
	public function __construct() {
		parent::__construct();
		if(TYPO3_MODE === 'BE') {
			$this->initializeAction();
			$this->view = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
		}
	}
	
	/**
     * Initializes the controller before invoking an action method.
     *
     * @return void
     */
    public function initializeAction()
    {
		$this->nj_domain_model = 'Backend';
       //$this->nj_domain_model = \N1coode\NjCollection\Utility\General::getShortClassName(__CLASS__);
		$this->nj_domain = strtolower($this->nj_domain_model);
		$this->init($this->nj_domain_model);
		
		
    }
	
	public function tcaAction($modus = '')
	{
		$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
 
		
		\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($extbaseFrameworkConfiguration);
		$extConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['tx_njpage']);
		//$this->controllerContext->injectExtensionService($extensionService);
		\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($extConfiguration);
	//	$this->view->setControllerContext($this->controllerContext);
		return $this->view->render();
	}
}