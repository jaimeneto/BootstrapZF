<?php

/**
 * A form date element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * A form date element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Date extends Bootstrap_Form_Element_Text
{
    public $helper = 'formDate';

    public function __construct($spec, $options = null)
    {
        $this->addValidator(new Zend_Validate_Date());
        
        parent::__construct($spec, $options);
    }
}
