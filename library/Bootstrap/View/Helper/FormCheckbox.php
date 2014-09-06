<?php
/**
 * View helper definition
 *
 * @category Forms
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Helper to generate a "checkbox" element with the Bootstrap UI.
 *
 * @category Forms
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_FormCheckbox extends Zend_View_Helper_FormCheckbox
{

    public function formCheckbox($name, $value = null, $attribs = null, array $checkedOptions = null)
    {
        $inputLabel = isset($attribs['inputLabel'])
                ? $attribs['inputLabel']
                : null;

        if (is_array($attribs)) {
            unset($attribs['inputLabel']);
        }

        $html = parent::formCheckbox($name, $value, $attribs, $checkedOptions);

        if (!isset($attribs['escape']) || $attribs['escape']) {
            $inputLabel = $this->view->escape($inputLabel);
        }
        
        // Wraps the checkbox with its own label (not the decorator one),
        // if the attrib input_label is added
        if ($inputLabel) {
            $html = '<label>' . $html . $inputLabel . '</label>';
        }

        return $html;
    }
}
