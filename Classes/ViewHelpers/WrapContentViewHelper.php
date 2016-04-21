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

/**
 * DESCRIPTION: 
 * 
 * @author n1coo.de
 * @package nj_page
 */
class WrapContentViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{	
	const _ELEMENT_ARTICLE		= 'article';
	const _ELEMENT_DIV			= 'div';
	const _ELEMENT_SECTION		= 'section';
	
	
	/**
	 * @var 
	 */
	private $data = NULL;
	
	/**
	 * @var boolean
	 */
	protected $escapeChildren = FALSE;

	/**
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;
	
	/**
	 * @var string 
	 */
	private $output;
	
	/**
	 * @var string 
	 */
	private $defaultRenderType = 'article';
	
	
	public function initialize() 
	{
		parent::initialize();
		$this->setData();
	}


	/**
	 * @return void
	 */
	public function initializeArguments() 
	{
		//$this->registerArgument('value', 'mixed', 'The value to output', FALSE, NULL);
	}
	
	/**
	 * @return string
	 */
	public function render() 
	{
		if($this->data !== NULL && is_array($this->data) && !empty($this->data))
		{
			$this->buildContentElement();
		}
		return $this->output;
	}
	
	
	private function buildContentElement()
	{
		$this->buildCeOpener();
		$this->concatOutput($this->renderChildren());
		$this->buildCeCloser();
	}
	
	
	private function buildCeOpener()
	{
		
		$this->concatOutput('<' . $this->getRenderType());
		$this->concatOutput($this->setAttribute('id', 'c'.$this->data['uid']),TRUE);
		$this->concatOutput($this->setAttribute('data-layout', $this->data['CType']),TRUE);
		
		if($this->data['tx_njpage_device_enable'] == 1)
		{
			if($this->data['tx_njpage_device'] !== '')
			{
				$this->concatOutput($this->setAttribute('data-device',$this->data['tx_njpage_device']), TRUE);
			}
			if($this->data['tx_njpage_orientation_enable'] == 1)
			{
				if($this->data['tx_njpage_orientation'] !== '')
				{
					$this->concatOutput($this->setAttribute('data-orientation',$this->data['tx_njpage_orientation']), TRUE);
				}
			}
		}
		$this->concatOutput('>');
	}
	
	
	private function setAttribute($name, $value)
	{
		return $name.'="'.$value.'"';
	}
	
	private function buildCeCloser()
	{
		$this->concatOutput('</' . $this->getRenderType() . '>');
	}
	
	
	/**
	 * Get page data
	 */
	private function setData()
	{
		$this->data = $this->templateVariableContainer->get('data');
	}
	
	
	private function concatOutput($expansion, $prependEmptySpace = FALSE)
	{
		if($prependEmptySpace) { $this->output .= ' '; }
		$this->output .= $expansion;
	}
	
	
	private function getRenderType()
	{
		if(isset($this->data['tx_njpage_render_type']))
		{
			if($this->data['tx_njpage_render_type'] !== '')
			{
				return $this->data['tx_njpage_render_type'];
			}
		}
		return $this->defaultRenderType;
	}

	
} //end of class