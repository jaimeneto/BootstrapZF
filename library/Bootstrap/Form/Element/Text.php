<?php

/**
 * A form text element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/Form/Element/Text.php';

/**
 * A form text element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Text extends Zend_Form_Element_Text
{

    public function __construct($spec, $options = null)
    {
        $options['class'] = 'form-control';
        
        parent::__construct($spec, $options);
    }
    
}
