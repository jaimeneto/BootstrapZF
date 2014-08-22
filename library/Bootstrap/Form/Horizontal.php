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
 * An "horizontal" Bootstrap's UI form
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Horizontal extends Bootstrap_Form
{
    public function __construct($options = null)
    {
        $this->setDisposition(self::DISPOSITION_HORIZONTAL);

        $options['elementDecorators'] = array(
            'ViewHelper',
            'ElementErrors',
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            'Addon',
            array(array('column' => 'HtmlTag'), array('tag' => 'div', 'class' => 'col-sm-10')),
            array('Label', array('class' => 'control-label col-sm-2')),
            array(array('wrapper' => 'HtmlTag'), array('tag' => 'div', 'class' => 'form-group')),
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
            array(array('column' => 'HtmlTag'), array('tag' => 'div', 'class' => 'col-sm-offset-2 col-sm-10')),
            array(array('wrapper' => 'HtmlTag'), array('tag' => 'div', 'class' => 'checkbox')),
            array(array('formGroup' => 'HtmlTag'), array('tag' => 'div', 'class' => 'form-group')),
        ));
    }
}
