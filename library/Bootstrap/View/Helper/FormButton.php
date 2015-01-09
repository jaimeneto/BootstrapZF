<?php
/**
 * View helper definition
 *
 * @category Helpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/View/Helper/FormElement.php';

/**
 * Helper to generate a button element
 *
 * @category Helpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_FormButton extends Zend_View_Helper_FormElement
{
    protected $_buttonType = 'button';
    
    /**
     * Generates a 'submit' button.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are extracted in place of added parameters.
     *
     * @param mixed $value The element value.
     *
     * @param array $attribs Attributes for the element tag.
     *
     * @return string The element XHTML.
     */
    public function formButton($name, $value = null, $attribs = null)
    {
        $info = $this->_getInfo($name, $value, $attribs);
        extract($info); // name, value, attribs, options, listsep, disable, id
        // check if disabled
        $disabled = '';
        if ($disable) {
            $disabled = ' disabled="disabled"';
        }

        if ($id) {
            $id = ' id="' . $this->view->escape($id) . '"';
        }

        if ($escape) {
            $value = $this->view->escape($value);
        }
        
        // Render the button.
        $html = '<button type="' . $this->_buttonType . '"'
              . ' name="' . $this->view->escape($name) . '"'
              . $id
               . ' value="' . $this->view->escape(trim(strip_tags($value))) . '"'
              . $disabled
              . $this->_htmlAttribs($attribs)
              . '>'
              . $value
              . '</button>';

        return $html;
    }
    
}
