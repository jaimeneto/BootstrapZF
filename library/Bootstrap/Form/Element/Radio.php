<?php

/**
 * Form field definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Bootstrap radio buttons
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Radio extends Zend_Form_Element_Radio
{
    /**
     * The default separator (Changed to be nothing for bootstrap)
     *
     * @var string
     */
    protected $_separator = '';

    /**
     * Remove all the default decorator for this element
     *
     * @return Bootstrap_Form_Element_Radio
     */
    public function loadDefaultDecorators ()
    {
        return $this;
    }
}
