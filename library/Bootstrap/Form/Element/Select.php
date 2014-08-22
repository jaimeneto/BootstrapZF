<?php

/**
 * A form select element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * A form select element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Select extends Zend_Form_Element_Select
{

    public function __construct($spec, $options = null)
    {
        $options['class'] = 'form-control';
        
        parent::__construct($spec, $options);
    }
    
}
