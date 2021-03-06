<?php

/**
 * A form button submit definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Bootstrap/Form/Element/Submit.php';

/**
 * A form submit button
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Reset extends Bootstrap_Form_Element_Submit
{

    /**
     * Use formButton view helper by default
     *
     * @var string
     */
    public $helper = 'formReset';

}
