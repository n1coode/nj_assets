<?php
/*                                                                        *
 * This script belongs to the TYPO3 package "nj_page".              *

 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */
namespace N1coode\NjPage\ViewHelpers;
use N1coode\NjPage\Utility\HtmlBuilder as Html;

/**
 * DESCRIPTION: This wrapper can be used to wrap the main "container" of a website.
 * The wrap will end in following sheme:
 * 
 *	<section id="id" class="n1base n1section" ...>
 *		<div class="n1base n1wrapper">
 *			<div class="n1base n1container">
 *				given child content
 *			</div>
 *		</div>
 *	</section>
 * 
 * body | n1section | n1wrapper | n1container | ... CONTENT ... | /n1container | /n1wrapper | /n1section | /body
 * 
 * @author n1coo.de
 * @package nj_page
 */
class WrapSectionViewHelper extends \N1coode\NjPage\ViewHelpers\AbstractWrapViewHelper
{	
	/**
	 * @var string 
	 */
	private $cssStyle = NULL;
	
	
	/**
	 * @var string
	 */
	private $dataDevice = NULL;
	
	/**
	 * @var string
	 */
	private $dataRole = NULL;
	
	/**
	 * @var string 
	 */
	private $dataOrientation = NULL;
	
	
	/**
	 * @var string
	 */
	private $id = NULL;

	/**
	 * @var string
	 */
	private $role = NULL;
	
	
	/**
	 * 
	 */
	public function initialize() 
	{
		parent::initialize();
		$this->setSectionAttributes();
	}
	
	
	/**
	 * Hint: $this->registerArgument('value', 'mixed', 'The value to output', FALSE, NULL);
	 * @return void
	 */
	public function initializeArguments() 
	{
		$this->registerArgument('addDataRole', 'boolean', 'Option whether the attribute data-role should be added or not.',FALSE,TRUE);
		$this->registerArgument('addId', 'boolean', 'Option whether the attribute id should be added or not.',FALSE,TRUE);
		$this->registerArgument('addBaseWrap','boolean', 'If set true, element is wrapped with "n1base"-classes.', FALSE, TRUE);
		$this->registerArgument('addInnerWrap', 'boolean', 'Option whether the inner wrapper "n1wrapper & n1con should be added or not.',FALSE, TRUE);
		$this->registerArgument('additionalClasses', 'string', 'Additional class for the main wrapper.',FALSE,NULL);
		$this->registerArgument('addRole','boolean', 'Option whether the attribute role should be added or not.',FALSE,FALSE);
		$this->registerArgument('angularView','boolean','Option whether section is angular view or not.',FALSE, FALSE);
		$this->registerArgument('dataDevice', 'string', 'Attribute in the main wrapper to handle output on devices.',FALSE,NULL);
		$this->registerArgument('dataOrientation', 'string', 'Attribute in the main wrapper to handle output on devices in dependency to orientation.',FALSE,NULL);
		$this->registerArgument('id', 'string', 'ID of the main wrapper. (If not set data-role will be used.)',FALSE,NULL);
		$this->registerArgument('isAngularView', 'Option to include attribute "ng-view" in the wrapper or not.', FALSE, FALSE);
		$this->registerArgument('role', 'string', 'Value is used for attributes id, data-role & role.',FALSE,NULL);
		$this->registerArgument('type', 'string', 'Type of the section: div, header, footer, section etc.',FALSE,NULL);
	}

	
	/**
	 * Renders the Wrapper
	 * @return string
	 */
	public function render() 
	{
		$this->builder();
		return $this->output;
	}
	
	
	/**
	 * @param string $argument Name of the array key in arguments
	 * @param string $value
	 * @return void
	 */
	private function argumentChange($argument,$value)
	{
		$this->arguments[$argument] = $value;
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
	 * Calls the setters for the variables used as section attributes.
	 * @return void
	 */
	private function setSectionAttributes()
	{
		$this->setDataRole();
		$this->setDataDevice();
		$this->setDataOrientation();
		$this->setDataRole();
		$this->setId();
		$this->setRenderType();
		$this->setRole();
	}
	
	/**
	 * Setter for section attribute 'data-device'
	 * @return void
	 */
	private function setDataDevice()
	{
		if($this->argumentIsNotEmpty('dataDevice'))
		{
			$this->dataDevice = $this->argumentGet('dataDevice');
		}
	}
	
	/**
	 * Setter for section attribute 'data-role'
	 * @return void
	 */
	private function setDataRole()
	{
		if($this->argumentIsTrue('addDataRole'))
		{
			$argument = 'role';
			if($this->argumentIsSet($argument))
			{
				$this->dataRole = $this->argumentGet($argument);
			}
		}
	}
	
	/**
	 * Setter for section attribute 'data-orientation'
	 * @return void
	 */
	private function setDataOrientation()
	{
		if($this->argumentIsNotEmpty('dataDevice') && $this->argumentIsNotEmpty('dataOrientation'))
		{
			$this->dataOrientation = $this->argumentGet('dataOrientation');
		}
	}
	
	/**
	 * Setter for section attribute 'id'
	 * @return void
	 */
	private function setId()
	{
		if($this->argumentIsTrue('addId'))
		{
			if($this->argumentIsNotEmpty('id'))
			{
				$this->id = self::_CLASS_PREFIX.$this->argumentGet('id');
			}
			else if($this->argumentIsNotEmpty('role')) 
			{
				$this->id = Html::_CLASS_PREFIX.$this->argumentGet('role');
			}
		}
	}
	
	
	/**
	 * Setter for section attribute 'role'
	 * @return void
	 */
	private function setRole()
	{
		if($this->argumentIsSet('type') && $this->argumentGet('type') === Html::_ELEMENT_SECTION_MAIN)
		{
			$this->role = $this->argumentGet('type');
			$this->argumentChange(addRole, TRUE);
		}
		else if($this->argumentIsTrue('addRole'))
		{
			if($this->argumentIsNotEmpty('role'))
			{
				$this->role = $this->argumentGet('role');
			}
		}
	}
	
	/**
	 * Builder of the output, that is returned by the renderer.
	 * @return void
	 */
	private function builder()
	{
		$this->buildSection();
		
	}
	
	/**
	 * Builds the section. Calls the wrapper builder.
	 * @return void
	 */
	private function buildSection()
	{
		$this->buildSectionOpener();
		$this->buildInnerWrap();
		$this->buildSectionCloser();
	}
	
	
	/**
	 * Adds the attributes to the section tag ('.n1base.n1section). Extends $this->output directly.
	 * @return void
	 */
	private function buildSectionAttributes()
	{
		if($this->id !== NULL) {
			$this->concatOutput(Html::attribute(Html::_ATTRIBUTE_ID, $this->id), TRUE);
		}
		if($this->dataDevice !== NULL) {
			$this->concatOutput(Html::attribute(Html::_ATTRIBUTE_DATA_DEVICE, $this->dataDevice), TRUE);
		}
		if($this->dataRole !== NULL) {
			$this->concatOutput(Html::attribute(Html::_ATTRIBUTE_DATA_ROLE, $this->dataRole), TRUE);
		}
		if($this->dataOrientation !== NULL) {
			$this->concatOutput(Html::attribute(Html::_ATTRIBUTE_DATA_ORIENTATION, $this->dataOrientation), TRUE);
		}
		if($this->role !== NULL) {
			$this->concatOutput(Html::attribute(Html::_ATTRIBUTE_ROLE, $this->role), TRUE);
		}
		if($this->argumentIsTrue('isAngularView') && !$this->argumentIsTrue('addInnerWrap'))
		{
			$this->concatOutput(Html::_ATTRIBUTE_ANGULAR_VIEW, TRUE);
		}
	}
	
	/**
	 * Adds the class(es) to the section tag ('.n1base.n1section). Extends $this->output directly.
	 * @return void
	 */
	private function buildSectionClass()
	{
		if($this->argumentIsTrue('addBaseWrap'))
		{
			$this->cssClass = Html::_CLASS_BASE;
			$this->cssClass = $this->concatString($this->cssClass, Html::_CLASS_SECTION, TRUE);
		}
		if($this->argumentIsNotEmpty('additionalClasses'))
		{
			$this->cssClass = $this->concatClasses($this->cssClass,$this->argumentGet('additionalClasses'));
		}
		if(strlen($this->cssClass) > 0)
		{
			$this->concatOutput(Html::attribute(Html::_ATTRIBUTE_CLASS, $this->cssClass), TRUE);
		}
	}
	
	/**
	 * Builds the closing tag of section element ('.n1base.n1section). Extends $this->output directly.
	 * @return void
	 */
	private function buildSectionCloser()
	{
		$this->concatOutput(Html::elementClose($this->renderType));
	}
	
	/**
	 * Builds the opening tag of the section element ('.n1base.n1section). Extends $this->output directly.
	 * @return void
	 */
	private function buildSectionOpener()
	{
		$this->concatOutput(Html::elementOpen($this->renderType,  Html::_TAG_ACTION_OPEN));
		$this->buildSectionClass();
		$this->buildSectionAttributes();
		$this->concatOutput(Html::elementOpen($this->renderType,  Html::_TAG_ACTION_CLOSE));
	}
	
	/**
	 * Builds the inner wrapper elements, including the child content. Extends $this->output directly.
	 * @return void
	 */
	private function buildInnerWrap()
	{
		$element = Html::_ELEMENT_STD_DIV;
		$x = 0;
		
		if($this->argumentIsTrue('addBaseWrap') && $this->argumentIsTrue('addInnerWrap')) {
			$x = $this->buildInnerWrapOpener($element);
		}
		
		/** adds the child content */
		$this->concatOutput($this->renderChildren());
		
		if($this->argumentIsTrue('addBaseWrap') && $this->argumentIsTrue('addInnerWrap')) {
			$this->buildInnerWrapCloser($x,$element);
		}
	}	
	
	/**
	 * Builds the closing tag(s) of the inner wrapper element(s) ('.n1base.n1wrapper>.n1base.n1container). 
	 * Extends $this->output directly.
	 * @param int $iteration
	 * @param string $element
	 * @return void
	 */
	private function buildInnerWrapCloser($iteration = 0,$element = Html::_ELEMENT_STD_DIV)
	{
		while($iteration > 0) {
			$this->concatOutput(Html::elementClose($element));
			$iteration--;
		}
	}
	
	/**
	 * Builds the opening tag(s) of the inner wrapper element(s) ('.n1base.n1wrapper>.n1base.n1container). 
	 * Extends $this->output directly.
	 * @param string $element
	 * @return int $x iteration
	 */
	private function buildInnerWrapOpener($element = Html::_ELEMENT_STD_DIV)
	{
		$x = 0;
		$this->concatOutput(Html::elementOpen($element, Html::_TAG_ACTION_OPEN));
		$this->concatOutput(Html::attribute(Html::_ATTRIBUTE_CLASS, Html::_CLASS_BASE.' '.Html::_CLASS_WRAPPER),TRUE);
		$this->concatOutput(Html::elementOpen($element, Html::_TAG_ACTION_CLOSE));
		$x++;
		$this->concatOutput(Html::elementOpen($element, Html::_TAG_ACTION_OPEN));
		$this->concatOutput(Html::attribute(Html::_ATTRIBUTE_CLASS, Html::_CLASS_BASE.' '.Html::_CLASS_CONTAINER),TRUE);
		if($this->argumentIsTrue('isAngularView'))
		{
			$this->concatOutput(Html::_ATTRIBUTE_ANGULAR_VIEW, TRUE);
		}
		$this->concatOutput(Html::elementOpen($element, Html::_TAG_ACTION_CLOSE));
		$x++;
		return $x;
	}

	/**
	 * @param string $classes
	 * @param string $additionalClasses
	 * @return string
	 */
	private function concatClasses($classes = '',$additionalClasses = '')
	{
		/** @var $concatenation string */ 
		$concatenation = $classes;
		
		$additionalClassesArray = explode(' ', $additionalClasses);
		
		foreach($additionalClassesArray as $additionalClass)
		{
			if(strpos($concatenation,$additionalClass)===false){
				$concatenation .= ' '.$additionalClass;
			}
		}
		return $concatenation;
	}


	/**
	 * Description: HOOK, to add your own attributes
	 * @return void
	 */
	public function addAttributes() {
	}
	
	
	/**
	 * Setter for sections type of element
	 * @return void
	 */
	protected function setRenderType()
	{
		if($this->argumentIsNotEmpty('type'))
		{
			$this->renderType = $this->argumentGet('type');
		}
	}
}