<?php
namespace N1coode\NjPage\ViewHelpers;
use N1coode\NjCollection\Utility\General as Utility;

/**
 * @author n1coode
 * @package nj_collection
 */
class WrapAngularViewHelper extends \N1coode\NjPage\ViewHelpers\AbstractWrapViewHelper
{
	const _ANGULAR_ATTRIBUTE_CLASS = 'ng-class';
	const _ANGULAR_ATTRIBUTE_CONTROLLER = 'ng-controller';
	
	const _ANGULAR_EXPRESSION_OPEN = '{{';
	const _ANGULAR_EXPRESSION_CLOSE = '}}';
	
	const _ANGULAR_TYPE_VIEW = 'ng-view';
	const _ANGULAR_TYPE = 'expression';
	
	/**
	 * @return void
	 */
	public function initializeArguments() 
	{
		$this->registerArgument('type', 'string', 'What to wrap.',FALSE,self::_ANGULAR_TYPE);
		$this->registerArgument('value', 'string', 'Value to render', FALSE,NULL);
	}
	
	public function initialize() {
		parent::initialize();
	}
	
	/**
	 * @return string $this->output
	 */
	public function render() 
	{
		switch($this->argumentGet('type'))
		{
			case self::_ANGULAR_TYPE:
				if($this->argumentIsSet('value')) {
					$this->output = $this->renderExpression($this->argumentGet('value'));
				}
				else {
					$this->output = $this->renderExpression($this->renderChildren());
				}
				break;
		}
		return $this->output;
	}
	
	/**
	 * @param string $argument Name of the array key in arguments
	 * @todo Nothing
	 */
	protected function argumentGet($argument)
	{
		return $this->arguments[$argument];
	}
	
	/**
	 * @param string $expression
	 * @return string
	 */
	protected function renderExpression($expression)
	{
		return self::_ANGULAR_EXPRESSION_OPEN.$expression.self::_ANGULAR_EXPRESSION_CLOSE;
	}
}