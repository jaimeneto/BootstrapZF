<?php

/**
 * A form number element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Bootstrap/Form/Element/Text.php';

/**
 * A form number element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Url extends Bootstrap_Form_Element_Text
{
    public $helper = 'formUrl';

}
