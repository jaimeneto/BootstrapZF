<?php

/**
 * View helper definition
 *
 * @category ViewHelpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Helper to generate an alert with the Bootstrap UI.
 *
 * @category ViewHelpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_Alert extends Zend_View_Helper_Abstract
{
    private static $_types = array(
        'ALERT'     => 'alert',
        'SUCCESS'   => 'alert alert-success',
        'INFO'      => 'alert alert-info',
        'WARNING'   => 'alert alert-warning',
        'DANGER'    => 'alert alert-danger'
    );

    public function alert($text, $type = 'ALERT', $closeButton=true, 
        $escape=true, $tag='div')
    {
        $type = strtoupper($type);
        
        if (!array_key_exists($type, self::$_types)) {
            $type = 'ALERT';
        }
        
        $class = self::$_types[$type];
        
        if ($closeButton) {
            $class .= ' alert-dismissible';
        }
        
        $text  = $escape
            ? $this->view->escape($this->view->translate($text))
            : $this->view->translate($text);
        
        $xhtml = '<' . $tag . ' class="' . $class . '" role="alert">';
        
        if ($closeButton) {
            $xhtml .= PHP_EOL 
                   . '<button type="button" class="close" data-dismiss="alert">' 
                   . '<span aria-hidden="true">&times;</span>' 
                   . '<span class="sr-only">' 
                   . $this->view->translate('Close')
                   . '</span>' 
                   . '</button>' . PHP_EOL;
        }
        
        $xhtml .= $text . '</' . $tag . '>' . PHP_EOL;
     
        return $xhtml;
    }

}
