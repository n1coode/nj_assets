<?php
namespace N1coode\NjPage\Utility;
use N1coode\NjPage\Service\Constants as Constants;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @author n1coo.de
 * @package nj_page
 */
class Tca
{
	const DEVICE_DESKTOP = 'desktop';
	const DEVICE_TABLET = 'tablet';
	const DEVICE_MOBILE = 'mobile';
	
	const ORIENTATION_PORTRAIT = 'portrait';
	const ORIENTATION_LANDSCAPE = 'landscape';
	
	var $nj_ext_key			= Constants::NJ_EXT_KEY;
	var $nj_ext_namespace	= Constants::NJ_EXT_NAMESPACE;
	var $nj_ext_path 		= Constants::NJ_EXT_PATH;
	var $nj_ext_title 		= Constants::NJ_EXT_TITLE;
	var $nj_ext_lang_file	= Constants::NJ_EXT_LANG_FILE_BACKEND;
	
	var $contentUid;

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	public $configurationManager;
	
	
	
	/**
	 * @var \TYPO3\CMS\Fluid\View\StandaloneView
	 */
	var $view;
	
	public function deviceSelection($PA, $fObj)
    {
		$this->contentUid = $PA['row']['uid'];
	
		$pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Page\\PageRenderer');
		$pageRenderer->addJsFile('../typo3conf/ext/'.$this->nj_ext_path.'/Resources/Public/JavaScript/backend.js');
		$pageRenderer->addCssFile('../typo3conf/ext/'.$this->nj_ext_path.'/Resources/Public/Css/Tca.css');
		
		$assignValues = [];
		
		$devices = [self::DEVICE_DESKTOP,self::DEVICE_TABLET,self::DEVICE_MOBILE];
		
		$assignValues['container'] = 'n1deviceList';
		$assignValues['devices'] = $devices;
		$assignValues['ext'] = Constants::extValues();
		$assignValues['orientations'] = ['portrait','landscape'];
		$assignValues['uid'] = $this->contentUid;
	
		$fluidTemplate = GeneralUtility::makeInstance('N1coode\NjPage\Utility\FluidTemplate');
		$fluidTemplate->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName(
            $fluidTemplate::DEFAULT_DIRECTORY_TEMPLATES . 'Backend/DeviceSelection.html'
        ));
		$fluidTemplate->assignMultiple($assignValues);
		
        return $fluidTemplate->render();
	}
}