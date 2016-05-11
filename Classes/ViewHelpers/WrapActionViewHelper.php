<?php
namespace N1coode\NjPage\ViewHelpers;
use N1coode\NjCollection\Utility\General as Utility;

/**
 * @author n1coode
 * @package nj_collection
 */
class WrapActionViewHelper extends \N1coode\NjPage\ViewHelpers\AbstractWrapViewHelper
{
	/**
	 * @var string 
	 */
	private $classes = '';
	
	/**
	 * @var boolean
	 */
	protected $escapeChildren = FALSE;

	/**
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;
	
	/**
	 * @var array 
	 */
	private $ext = NULL;
	
	
	public function initialize() {
		parent::initialize();
		$this->ext = $this->argumentGet('ext');
		$this->setClasses();
	}
	
	/**
	 * @return void
	 */
	public function initializeArguments() 
	{
		$this->registerArgument('class', 'string', 'Additional classes for the wrapper.',FALSE,NULL);
		$this->registerArgument('ext', 'array', 'Extension name variables.',FALSE,NULL);
		$this->registerArgument('additionalAttributes', 'array', 'Additional arguments.',FALSE,NULL);
		$this->registerArgument('style','string','Additional style for the wrapper',FALSE,NULL);
	}
	
	
	/**
	 * @return string $this->output
	 */
	public function render() 
	{
		if($this->ext !== NULL && !empty($this->ext))
		{
			$this->concatOutput('<div class="');
			$this->concatOutput($this->classes);
			$this->concatOutput('"');
			$this->addAdditionalStyle();
			$this->addAdditionalAttributes();
			$this->concatOutput('>');
			
			$this->concatOutput($this->renderChildren());
			
			$this->concatOutput("</div>");
		}
		return $this->output;
	}
	
	
	private function setWrapperArguments()
	{
		
	}
			
	private function setClasses()
	{
		$this->addClass('key');
		$this->addClass('domain');
		$this->addClass('action');
		
		if($this->argumentIsSet('class'))
		{
			$this->classes = Utility::concatString(
				$this->classes, 
				$this->argumentGet('class'), 
				Utility::stringIsEmpty($this->classes)
			);
		}
		
		$this->classes = Utility::concatString($this->classes, 'clearfix', TRUE);
		
	}
	
	/**
	 * @param string $arrayKey
	 */
	private function addClass($arrayKey)
	{
		if(array_key_exists($arrayKey, $this->ext))
		{
			$emptySpace = strlen($this->classes) > 0 ? TRUE : FALSE;
			$this->classes = Utility::concatString($this->classes, $this->ext[$arrayKey], $emptySpace);
		}
	}
	
	private function addAdditionalAttributes()
	{
		if($this->argumentIsNotEmpty('additionalAttributes'))
		{
			foreach($this->argumentGet('additionalAttributes') as $key => $value)
			{
				if($key !== 'style')
				{
					$this->concatOutput($key.'="'.$value.'"', TRUE);
				}
			}
		}
	}
	
	
	private function addAdditionalStyle()
	{
		if($this->argumentIsNotEmpty('style'))
		{
			$this->concatOutput('style="'.$this->argumentGet('style').'"', TRUE);
		}
	}
	
	
	/**
	 * @param string $argument Name of the array key in arguments
	 * @todo Nothing
	 */
	protected function argumentGet($argument)
	{
		return $this->arguments[$argument];
	}
}