<?php
/**
 * Base form class definition for inline forms
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Base form class for inline forms. The inline form displays the form elements as
 * "inline-blocks", and there is no wrapper for themselves.
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Inline extends Bootstrap_Form
{
    public function __construct($options = null)
    {
        $this->_initializePrefixes();

        $this->setDisposition(self::DISPOSITION_INLINE);

        $options['elementDecorators'] = array(
            'ViewHelper',
            'ElementErrors',
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            'Addon',
            array('Label', array('class' => 'control-label')),
            array('HtmlTag', array('tag' => 'div', 'class' => 'form-group')),
        );

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
