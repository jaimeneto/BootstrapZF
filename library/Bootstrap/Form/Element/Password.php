<?php

/**
 * A form password element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/Form/Element/Password.php';

/**
 * A form password element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Password extends Zend_Form_Element_Password
{

    public function __construct($spec, $options = null)
    {
        $options['class'] = 'form-control';
        
        parent::__construct($spec, $options);
    }
    
}
