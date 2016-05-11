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
namespace N1coode\NjPage\ViewHelpers\Format;

/**
 * DESCRIPTION: 
 * 
 * @author n1coo.de
 * @package nj_page
 */
class JsonViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
	/**
	 * @var boolean
	 */
	protected $escapeChildren = FALSE;

	/**
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;
	
	/**
	 * @return void
	 */
	public function initializeArguments() 
	{}
	
	/**
	 * @return void
	 */
	public function render() 
	{
		$content = $this->renderChildren();
		if (TRUE === empty($content)) {
				return '{}';
		}
		else {
			$data = [];
			$data['content'] = $content;
			
			return json_encode($data);
		}
	}
}