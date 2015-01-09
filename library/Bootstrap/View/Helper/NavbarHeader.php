<?php

/**
 * View helper definition
 *
 * @category Menus
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/View/Helper/Abstract.php';

/**
 * Helper to generate a navbar header with the Bootstrap UI.
 *
 * @category Menus
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_NavbarHeader extends Zend_View_Helper_Abstract
{

    public function navbarHeader($brand = '', $target = 'navbar-target', 
            $url = '#')
    {        
        $html = '<div class="navbar-header">'
              . '<button type="button" class="navbar-toggle" '
              . 'data-toggle="collapse" data-target="#' . $target . '">'
              . '<span class="sr-only">' 
              . $this->view->translate('Toggle navigation') 
              . '</span>'
              . '<span class="icon-bar"></span>'
              . '<span class="icon-bar"></span>'
              . '<span class="icon-bar"></span>'
              . '</button>'
              . '<a class="navbar-brand" href="' . $url . '">' 
              . $brand 
              . '</a>'
              . '</div>';
        
        return $html;
    }

}
