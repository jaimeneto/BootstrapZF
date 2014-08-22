<?php

/**
 * A form month element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * A form month element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Month extends Bootstrap_Form_Element_Text
{
    public $helper = 'formMonth';

    public function __construct($spec, $options = null)
    {
        $this->addValidator(new Zend_Validate_Date(array(
            'format' => 'yyyy-MM'
        )));
        
        parent::__construct($spec, $options);
    }
    
}
