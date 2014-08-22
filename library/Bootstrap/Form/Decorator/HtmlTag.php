<?php
/**
 * Form decorator definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Decorator
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Defines a decorator to wrap all the Bootstrap form elements
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Decorator
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Decorator_HtmlTag extends Zend_Form_Decorator_HtmlTag
{
    public function render($content)
    {
        $class = $this->getOption('class');
        
        $element = $this->getElement();
        
//        if (strstr($class, 'form-group')) {
//            if ($element instanceof Zend_Form_Element_Checkbox) {
//                $class = str_replace('form-group', 'checkbox', $class);
//            }
//        }
        
        if ($element->hasErrors()) {
            $class .= ' has-error';
        }
        
        $class = trim($class);
        
        if ($class) {
            $this->setOption('class', $class);
        } else {
            $this->removeOption('class');
        }
        
        return parent::render($content);
    }
}
