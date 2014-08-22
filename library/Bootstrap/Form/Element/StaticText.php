<?php

/**
 * A form button submit definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * A form uneditable textfield element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_StaticText extends Zend_Form_Element_Text
{
    /**
     * Use formButton view helper by default
     *
     * @var string
     */
    public $helper = 'formStaticText';
    
    public function isValid($value, $context = null)
    {
        return true;
    }
}
