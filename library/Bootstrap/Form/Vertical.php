<?php
/**
 * Form definition
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Bootstrap/Form.php';

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
            'Addon',
            'ElementErrors',
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            array('Label', array('class' => 'control-label')),
            array('HtmlTag', array('tag' => 'div', 'class' => 'form-group')),
        );

        $options['disableLoadDefaultDecorators'] = true;
        
        parent::__construct($options);
    }
    
    protected function _customizeCheckboxElement(&$element)
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
