<?php
namespace N1coode\NjPage\Utility;

use TYPO3\CMS\Fluid\View\AbstractTemplateView;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @package nj_page
 */
class FluidTemplate
{
    /**
	 * @var string 
	 */
    const DEFAULT_DIRECTORY_LAYOUTS = 'EXT:nj_page/Resources/Private/Layouts/';

    /** 
	 * @var string 
	 */
    const DEFAULT_DIRECTORY_PARTIALS = 'EXT:nj_page/Resources/Private/Partials/';

	/**
	 * @var sring
	 */
	const DEFAULT_DIRECTORY_TEMPLATES = 'EXT:nj_page/Resources/Private/Templates/';
	
    /**
     * @var \TYPO3\CMS\Fluid\View\StandaloneView
     */
    protected $fluidTemplate = null;

    /**
     * @var array with temporary files
     */
    protected $temporaryFiles = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Initializes the fluid template utility
     *
     * @return void
     */
    protected function init()
    {
        // Add extbase_object to cacheConfigurations
        $cacheConfigurations = array_merge(
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'],
            array('extbase_object' => array())
        );
        GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager')
            ->setCacheConfigurations($cacheConfigurations);

        $this->fluidTemplate = GeneralUtility::makeInstance('TYPO3\CMS\Fluid\View\StandaloneView');
        $this->fluidTemplate->setLayoutRootPaths([GeneralUtility::getFileAbsFileName(self::DEFAULT_DIRECTORY_LAYOUTS)]);
        $this->fluidTemplate->setPartialRootPaths([GeneralUtility::getFileAbsFileName(self::DEFAULT_DIRECTORY_PARTIALS)]);
		$this->fluidTemplate->setTemplateRootPaths([GeneralUtility::getFileAbsFileName(self::DEFAULT_DIRECTORY_TEMPLATES)]);
    }

    /**
     * Loads the template source and render the template.
     *
     * @param string $actionName If set, the view of the specified action will
     *                           be rendered instead.
     *        Default is the action specified in the Request object
     * @return string Rendered Template
     */
    public function render($actionName = null)
    {
        return $this->fluidTemplate->render($actionName);
    }

    /**
     * Assign a value to the variable container.
     *
     * @param string $key The key of a view variable to set
     * @param mixed $value The value of the view variable
     * @return AbstractTemplateView the instance of this view to allow chaining
     */
    public function assign($key, $value)
    {
        return $this->fluidTemplate->assign($key, $value);
    }

	/**
     * Assign multiple values to the variable container.
     *
     * @param array $values The values to be set
     * @return AbstractTemplateView the instance of this view to allow chaining
     */
	public function assignMultiple($values)
	{
		return $this->fluidTemplate->assignMultiple($values); 
	}
	
    /**
     * Sets the absolute path to a Fluid template file
     *
     * @param string $templatePathAndFilename Fluid template path
     * @return void
     */
    public function setTemplatePathAndFilename($templatePathAndFilename)
    {
        $this->fluidTemplate->setTemplatePathAndFilename($templatePathAndFilename);
    }

    /**
     * Sets the Fluid template source
     *
     * @param string $templateSource Fluid template source code
     * @return void
     */
    public function setSource($templateSource)
    {
        $this->fluidTemplate->setTemplateSource($templateSource);
    }

    /**
     * Set the root path to the layouts.
     * If set, overrides the one determined from $this->layoutRootPathPattern
     *
     * @param string $layoutRootPath Root path to the layouts. If set, overrides
     *                               the one determined from
     *                               $this->layoutRootPathPattern
     * @return void
     */
    public function setLayoutRootPath($layoutRootPath)
    {
        $this->fluidTemplate->setLayoutRootPath($layoutRootPath);
    }

    /**
     * Sets the absolute path to the folder that contains Fluid partial files.
     *
     * @param string $partialRootPath Fluid partial root path
     * @return void
     */
    public function setPartialRootPath($partialRootPath)
    {
        $this->fluidTemplate->setPartialRootPath($partialRootPath);
    }
}

