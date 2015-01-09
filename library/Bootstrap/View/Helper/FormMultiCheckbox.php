<?php
/**
 * View helper definition
 *
 * @category Helpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/View/Helper/FormMultiCheckbox.php';

/**
 * A helper to render a set of checkboxes
 *
 * @category Helpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_FormMultiCheckbox extends Zend_View_Helper_FormMultiCheckbox
{
    public function formMultiCheckbox($name, $value = null, $attribs = null,
                                      $options = null, $listsep = '')
    {
        $info = $this->_getInfo($name, $value, $attribs, $options, $listsep);
        extract($info); // name, value, attribs, options, listsep, disable
        
        // retrieve attributes for labels (prefixed with 'label_' or 'label')
        $label_attribs = array();
        foreach ($attribs as $key => $val) {
            $tmp    = false;
            $keyLen = strlen($key);
            if ((6 < $keyLen) && (substr($key, 0, 6) == 'label_')) {
                $tmp = substr($key, 6);
            } elseif ((5 < $keyLen) && (substr($key, 0, 5) == 'label')) {
                $tmp = substr($key, 5);
            }

            if ($tmp) {
                // make sure first char is lowercase
                $tmp[0] = strtolower($tmp[0]);
                $label_attribs[$tmp] = $val;
                unset($attribs[$key]);
            }
        }

        $buttonType = isset($attribs['buttonType']) 
                    ? $attribs['buttonType'] 
                    : null;
        
        $inline = isset($attribs['inline']) && $attribs['inline'];
        
        unset($attribs['buttonType'], $attribs['inline']);
        
        if ($buttonType) {
            $label_attribs['class'] = isset($label_attribs['class']) 
                    ? trim($label_attribs['class'] . ' btn btn-' . $buttonType)
                    : 'btn btn-' . $buttonType;
            
        } else {
            if ($inline) {
                $label_attribs['class'] = isset($label_attribs['class']) 
                        ? trim($label_attribs['class'] . ' checkbox-inline')
                        : 'checkbox-inline';
            }
        }

        $labelPlacement = 'append';
        foreach ($label_attribs as $key => $val) {
            switch (strtolower($key)) {
                case 'placement':
                    unset($label_attribs[$key]);
                    $val = strtolower($val);
                    if (in_array($val, array('prepend', 'append'))) {
                        $labelPlacement = $val;
                    }
                    break;
            }
        }

        // the radio button values and labels
        $options = (array) $options;

        // build the element
        $html = '';
        $list  = array();

        // should the name affect an array collection?
        $name = $this->view->escape($name);
        if ($this->_isArray && ('[]' != substr($name, -2))) {
            $name .= '[]';
        }

        // ensure value is an array to allow matching multiple times
        $value = (array) $value;

        // XHTML or HTML end tag?
        $endTag = ' />';
        if (($this->view instanceof Zend_View_Abstract) && !$this->view->doctype()->isXhtml()) {
            $endTag= '>';
        }

        // Set up the filter - Alnum + hyphen + underscore
        // require_once 'Zend/Filter/PregReplace.php';
        $pattern = @preg_match('/\pL/u', 'a')
            ? '/[^\p{L}\p{N}\-\_]/u'    // Unicode
            : '/[^a-zA-Z0-9\-\_]/';     // No Unicode
        $filter = new Zend_Filter_PregReplace($pattern, "");

        // add radio buttons to the list.
        foreach ($options as $opt_value => $opt_label) {

            // Should the label be escaped?
            if ($escape) {
                $opt_label = $this->view->escape($opt_label);
            }

            // is it disabled?
            $disabled = '';
            if (true === $disable) {
                $disabled = ' disabled="disabled"';
            } elseif (is_array($disable) && in_array($opt_value, $disable)) {
                $disabled = ' disabled="disabled"';
            }

            $labelAttribs = $label_attribs;
            
            // is it checked?
            $checked = '';
            if (in_array($opt_value, $value)) {
                $checked = ' checked="checked"';
                $labelAttribs['class'] .= ' active';
            }

            // generate ID
            $optId = $id . '-' . $filter->filter($opt_value);

            $radio = '';
            if (!$inline) {
                $radio .= '<div class="checkbox">';
            }
            
            // Wrap the radios in labels
            $radio .= '<label'
                    . $this->_htmlAttribs($labelAttribs) . '>'
                    . '<input type="' . $this->_inputType . '"'
                    . ' name="' . $name . '"'
                    . ' id="' . $optId . '"'
                    . ' value="' . $this->view->escape($opt_value) . '"'
                    . $checked
                    . $disabled
                    . $this->_htmlAttribs($attribs)
                    . $endTag
                    . $opt_label
                    . '</label>';

            if (!$inline) {
                $radio .= '</div>';
            }
            
            // add to the array of radio buttons
            $list[] = $radio;
        }

        // done!
        $html .= implode($listsep, $list);

        if ($buttonType) {
            $html = '<div class="btn-group" data-toggle="buttons">'
                   . $html
                   . '</div>';
        }
        
        return $html;
    }

}
