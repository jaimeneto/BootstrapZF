<?php

/**
 * A form textarea element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/Form/Element/Textarea.php';

/**
 * A form textarea element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Textarea extends Zend_Form_Element_Textarea
{

    public function __construct($spec, $options = null)
    {
        $options['class'] = 'form-control';
        
        parent::__construct($spec, $options);
    }
    
}
