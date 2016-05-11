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
 * DESCRIPTION: 
 * 
 * @author n1coo.de
 * @package nj_page
 */
class WrapContentViewHelper extends \N1coode\NjPage\ViewHelpers\AbstractWrapViewHelper
{	
	const _ELEMENT_ARTICLE		= 'article';
	const _ELEMENT_DIV			= 'div';
	const _ELEMENT_SECTION		= 'section';
	
	const _CLASS_CONTAINER		= "n1container";
	const _CLASS_MAIN			= "n1base";
	const _CLASS_PREFIX			= "n1";
	const _CLASS_SECTION		= "n1section";
	const _CLASS_WRAPPER		= "n1wrapper";

	/**
	 * @var boolean 
	 */
	protected $addInnerWrap	= FALSE;
	
	
	public function initialize() 
	{
		parent::initialize();
		$this->setData();
		$this->setWrapAttributes();
		$this->setWrapperClass();
	}
	
	/**
	 * @return void
	 */
	public function initializeArguments() 
	{
		
	}
	
	
	/**
	 * @return string
	 */
	public function render() 
	{
		$this->buildWrapper();
		return $this->output;
	}
	
	
	/**
	 * Set content Data
	 */
	private function setData()
	{
		$this->data = $this->templateVariableContainer->get('data');		
	}
	
	/**
	 * 
	 */
	private function setWrapAttributes()
	{
		$this->setAddInnerWrap();
		$this->setRenderType();
	}
	
	
	/**
	 * @param string $argument Name of the array key in arguments
	 * @todo Nothing
	 */
	protected function argumentGet($argument)
	{
		return $this->data[$argument];
	}
	
	
	protected function setAddInnerWrap()
	{
		if($this->argumentIsTrue('tx_njpage_wrap_enable'))
		{
			$this->addInnerWrap = TRUE;
		}
	}
	
	/**
	 * Setter for sections type of element
	 * @return void
	 */
	protected function setRenderType()
	{
		if($this->argumentIsNotEmpty('tx_njpage_render_type'))
		{
			$this->renderType = $this->argumentGet('tx_njpage_render_type');
		}
	}
	
	
	protected function buildWrapper()
	{
		if(!$this->argumentIsTrue('tx_njpage_wrap_disable_overall'))
		{
			$this->concatOutput('<'.$this->renderType);
			$this->concatOutput('class="'.$this->cssClass.'"',TRUE);
			$this->concatOutput(Html::attribute('id', 'c'.$this->data['uid']),TRUE);
			$this->concatOutput(Html::attribute('data-layout',$this->data['CType']),TRUE);
			$this->concatOutput('>');
			if($this->addInnerWrap)
			{
				$this->concatOutput('<div class="'.Html::_CLASS_BASE.Html::_EMPTY_SPACE.Html::_CLASS_CONTAINER.'">');
			}
			$this->buildHeader();
		}	
		
			//$this->concatOutput($this->renderChildren());
			$this->concatOutput($this->renderChildren());
			
		if(!$this->argumentIsTrue('tx_njpage_wrap_disable_overall'))
		{
			if($this->addInnerWrap)
			{
				$this->concatOutput('</div>');
			}
			$this->concatOutput('</'.$this->renderType.'>');
		}
	}
	
	
	/**
	 * Adds the class(es) to the section tag ('.n1base.n1section). Extends $this->output directly.
	 * @return void
	 */
	protected function setWrapperClass()
	{
		if($this->addInnerWrap)
		{
			$this->cssClass = Html::_CLASS_BASE.Html::_EMPTY_SPACE.Html::_CLASS_WRAPPER;
		}
		$emptySpace = strlen($this->cssClass) > 0 ? TRUE : FALSE;
		
		$this->cssClass = $this->concatString($this->cssClass,$this->argumentGet('tx_njpage_alignment'),$emptySpace);
		
		if($this->argumentIsTrue('tx_njpage_class_enable') && $this->argumentIsSet('tx_njpage_class'))
		{
			$emptySpace = strlen($this->cssClass) > 0 ? TRUE : FALSE;
			$this->cssClass = $this->concatString($this->cssClass,$this->argumentGet('tx_njpage_class'),$emptySpace);
		}
		
	}
	
	protected function buildHeader()
	{
		$output = '';
		$element = Html::_ELEMENT_SECTION_HEADLINE_2;
		if($this->argumentIsNotEmpty('header'))
		{
			if(intval($this->argumentGet('header_layout')) !== 100)
			{
				switch(intval($this->argumentGet('header_layout')))
				{
					case 1:
						$element = Html::_ELEMENT_SECTION_HEADLINE_3;
						break;
					case 2:
						$element = Html::_ELEMENT_SECTION_HEADLINE_4;
						break;
					case 3:
						$element = Html::_ELEMENT_SECTION_HEADLINE_5;
						break;
					case 4:
						$element = Html::_ELEMENT_SECTION_HEADLINE_6;
						break;
					default:
						$element = Html::_ELEMENT_SECTION_HEADLINE_2;
				}
				
				$output = Html::elementOpen($element, Html::_TAG_ACTION_COMPLETE).$this->argumentGet('header').Html::elementClose($element);
			}
		}
		$this->concatOutput($output);
	}
}