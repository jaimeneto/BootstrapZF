<?php

/**
 * A form password element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/Form/Element/Password.php';

/**
 * A form password element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Password extends Zend_Form_Element_Password
{
    const SIZE_LARGE = 'lg';
    const SIZE_DEFAULT = '';
    const SIZE_SMALL = 'sm';
    
    public function __construct($spec, $options = null)
    {
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        
        $classes = explode(' ', $options['class']);
        $classes[] = 'form-control';
        
        if (isset($options['size']) && in_array($options['size'], array(
                self::SIZE_LARGE, self::SIZE_SMALL))) {
            $classes[] = 'input-' . $options['size'];
            unset($options['size']);
        }
        
        $classes = array_unique($classes);
        $options['class'] = trim(implode(' ', $classes));
        
        parent::__construct($spec, $options);
    }
    
}
