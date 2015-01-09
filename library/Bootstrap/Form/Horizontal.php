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
 * An "horizontal" Bootstrap's UI form
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Horizontal extends Bootstrap_Form
{
    protected $colLabel = 2;
    protected $colInput = 10;
    protected $colWrapper = 12;
    
    public function __construct($options = null)
    {
        $this->setDisposition(self::DISPOSITION_HORIZONTAL);

        $colWrapperClass = $this->colWrapper != 12
                ? ' col-md-' . $this->colWrapper
                : '';
        
        $options['elementDecorators'] = array(
            'ViewHelper',
            'Addon',
            'ElementErrors',
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            array(array('column' => 'HtmlTag'), array('tag' => 'div', 'class' => 'col-sm-' . $this->colInput)),
            array('Label', array('class' => 'control-label col-sm-' . $this->colLabel)),
            array(array('wrapper' => 'HtmlTag'), array('tag' => 'div', 'class' => 'form-group' . $colWrapperClass)),
        );

        parent::__construct($options);
    }
    
    protected function _customizeCheckboxElement(&$element)
    {
        $element->setAttrib('inputLabel', $element->getLabel());
        $element->setDecorators(array(
            'ViewHelper',
            'ElementErrors',
            array('Description', array('tag' => 'span', 'class' => 'help-block')),
            array(array('wrapper' => 'HtmlTag'), array('tag' => 'div', 'class' => 'checkbox')),
            array(array('column' => 'HtmlTag'), array('tag' => 'div', 'class' => 'col-sm-offset-' . $this->colLabel . ' col-sm-' . $this->colInput)),
        ));
    }
}
