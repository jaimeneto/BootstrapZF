<?php

/**
 * A form number element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * A form number element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Number extends Bootstrap_Form_Element_Text
{
    public $helper = 'formNumber';

    public function __construct($spec, $options = null)
    {
        $this->addValidator(new Zend_Validate_Digits());
        
        parent::__construct($spec, $options);
    }
}
