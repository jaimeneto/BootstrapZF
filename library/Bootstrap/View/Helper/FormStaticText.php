<?php
/**
 * View helper definition
 *
 * @category Forms
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/View/Helper/FormElement.php';

/**
 * Helper to generate an uneditable form textfield.
 *
 * @category Forms
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_FormStaticText extends Zend_View_Helper_FormElement
{
    /**
     * Generates a 'text' element, that cannot be edited.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are used in place of added parameters.
     *
     * @param mixed $value The element value.
     *
     * @param array $attribs Attributes for the element tag.
     *
     * @return string The element HTML.
     */
    public function formStaticText($name, $value = null, $attribs = null)
    {
        if (!isset($attribs['class'])) {
            $attribs['class'] = '';
        }
        
        $attribs['class'] .= ' form-control-static';
        $attribs['class'] = trim($attribs['class']);

        if (!isset($attribs['escape']) || $attribs['escape']) {
            $value = $this->view->escape($value);
        }
        
        $html = '<p '. $this->_htmlAttribs($attribs) .'>' 
              . $value 
              . '</p>';
        
        return $html;
    }
}
