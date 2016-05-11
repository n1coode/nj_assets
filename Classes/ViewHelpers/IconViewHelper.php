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
use TYPO3\CMS\Core\Utility\GeneralUtility as GeneralUtility;

/**
 * DESCRIPTION: 
 * 
 * @author n1coo.de
 * @package nj_page
 */
class IconViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{	
	/**
	 * @return void
	 */
	public function initializeArguments() 
	{
		$this->registerArgument('icon', 'string', 'The icon to be rendered.',TRUE,NULL);
	}
	
	/**
	 * @return void
	 */
	public function render() 
	{
		if($this->arguments['icon'] !== NULL) {
			return $this->renderIcon();
		}
		else {
			return 'Error: attribute icon not set.';
		}
	}
	
	
	/**
     * @return string
     */
    protected function renderIcon()
    {
		$assignValues = [];
		$assignValues['icon'] = $this->arguments['icon'];
		
		$fluidTemplate = GeneralUtility::makeInstance('N1coode\NjPage\Utility\FluidTemplate');
		$fluidTemplate->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName(
            $fluidTemplate::DEFAULT_DIRECTORY_TEMPLATES . 'ViewHelpers/Icon.html'
        ));
		$fluidTemplate->assignMultiple($assignValues);
		
        return $fluidTemplate->render();
    }
}