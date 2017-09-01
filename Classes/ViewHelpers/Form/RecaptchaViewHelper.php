<?php
namespace Evoweb\Recaptcha\ViewHelpers\Form;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016-2017 Sebastian Fischer <typo3@evoweb.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class RecaptchaViewHelper
 */
class RecaptchaViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\AbstractFormFieldViewHelper
{
    /**
     * @return string
     */
    public function render()
    {
        $name = $this->getName();
        $this->registerFieldNameForFormTokenGeneration($name);

        $captchaService = \Evoweb\Recaptcha\Services\CaptchaService::getInstance();

        $this->templateVariableContainer->add('configuration', $captchaService->getConfiguration());
        $this->templateVariableContainer->add('showCaptcha', $captchaService->getShowCaptcha());
        $this->templateVariableContainer->add('name', $name);

        $content = $this->renderChildren();

        $this->templateVariableContainer->remove('configuration');
        $this->templateVariableContainer->remove('showCaptcha');
        $this->templateVariableContainer->remove('name');

        return $content;
    }
}
