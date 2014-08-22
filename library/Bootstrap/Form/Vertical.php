<?php
/**
 * Form definition
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Base class for default form style
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Vertical extends Bootstrap_Form
{
    /**
     * Class constructor override.
     *
     * @param null $options
     */
    public function __construct($options = null)
    {
        $options['elementDecorators'] = array(
            'ViewHelper',
            'ElementErrors',
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            'Addon',
            array('Label', array('class' => 'control-label')),
            array('HtmlTag', array('tag' => 'div', 'class' => 'form-group')),
        );

        $options['disableLoadDefaultDecorators'] = true;
        
        parent::__construct($options);
    }
    
    protected function _cutomizeCheckboxElement(&$element)
    {
        $element->setAttrib('inputLabel', $element->getLabel());
        $element->setDecorators(array(
            'ViewHelper',
            'ElementErrors',
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            array('HtmlTag', array('tag' => 'div', 'class' => 'checkbox')),
        ));
    }
}
