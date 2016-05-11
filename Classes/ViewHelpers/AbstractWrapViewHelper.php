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
class AbstractWrapViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{	
	const _DEFAULT_RENDER_TYPE	= Html::_ELEMENT_STD_DIV;
	
	/**
	 * @var string 
	 */
	protected $cssClass = '';	
	
	
	/**
	 * @var array 
	 */
	protected $data = [];
	
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
	protected $output = '';
	
	/**
	 * @var string 
	 */
	protected $renderType = self::_DEFAULT_RENDER_TYPE;
	
	
	/**
	 * @param string $argument Name of the array key in arguments
	 */
	protected function argumentGet($argument)
	{}
	
	/**
	 * @param string $argument Name of the array key in arguments
	 * @return boolean
	 */
	protected function argumentIsNotEmpty($argument)
	{
		if($this->argumentIsSet($argument))
		{
			if($this->argumentGet($argument) !== '')
			{
				return true;
			}
		}
		return false;
	}
	
	
	/**
	 * @param string $argument Name of the array key in arguments
	 * @return boolean
	 */
	protected function argumentIsSet($argument)
	{
		if($this->argumentGet($argument) !== NULL)
		{
			return true;
		}
		return false; 
	}
	
	/**
	 * @param string $argument Name of the array key in arguments
	 * @return boolean
	 */
	protected function argumentIsTrue($argument)
	{
		if(is_bool($this->argumentGet($argument)))
		{
			if($this->argumentIsSet($argument))
			{
				if($this->argumentGet($argument) === TRUE)
				{
					return true;
				}
			}
		}
		else {
			if($this->argumentIsSet($argument))
			{
				if($this->argumentGet($argument) > 0)
				{
					return true;
				}
			}
		}
		return false;
	}
	
	
	protected function concatOutput($expansion, $prependEmptySpace = FALSE)
	{
		if($prependEmptySpace) { $this->output .= ' '; }
		$this->output .= $expansion;
	}
	
	protected function concatString($string,$expansion,$prependEmptySpace = FALSE)
	{
		$concatenation = $string;
		if($prependEmptySpace) { $concatenation .= ' '; }
		return $concatenation . $expansion;
	}
	
	
	/**
	 * Setter for sections type of element
	 * @return void
	 */
	protected function setRenderType()
	{}
	
	
	
}