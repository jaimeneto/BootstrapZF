<?php

/**
 * A form email element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Bootstrap/Form/Element/Text.php';

/**
 * A form email element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Email extends Bootstrap_Form_Element_Text
{
    public $helper = 'formEmail';

    public function __construct($spec, $options = null)
    {
        $this->addValidator('EmailAddress');
        
        parent::__construct($spec, $options);
    }
    
}
