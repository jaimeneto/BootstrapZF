<?php
/**
 * View helper definition
 *
 * @category Helpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Helper to generate a submit button element
 *
 * @category Helpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_FormSubmit extends Bootstrap_View_Helper_FormButton
{
    protected $_buttonType = 'submit';
    
    public function formSubmit($name, $value = null, $attribs = null)
    {
        return $this->formButton($name, $value, $attribs);
    }
}
