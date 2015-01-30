<?php
/**
 * Form decorator definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Decorator
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/Form/Decorator/HtmlTag.php';

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

        if (method_exists($element, 'hasErrors') && $element->hasErrors()) {
            $class .= ' has-error';
        }
        
        $class .= ' ' . strtolower(str_replace('_', '-', get_class($element)));
        
        $class = trim($class);
        
        if ($class) {
            $this->setOption('class', $class);
        } else {
            $this->removeOption('class');
        }
        
        return parent::render($content);
    }
}
