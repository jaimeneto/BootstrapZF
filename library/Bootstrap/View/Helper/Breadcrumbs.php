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
 * @see Zend_View_Helper_Navigation_HelperAbstract
 */
require_once 'Zend/View/Helper/Navigation/Breadcrumbs.php';

/**
 * Helper for printing breadcrumbs in Bootstrap's format
 *
 * @category ViewHelpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_Breadcrumbs
    extends Zend_View_Helper_Navigation_Breadcrumbs
{
    /**
     * Breadcrumbs separator string
     *
     * @var string
     */
    protected $_separator = PHP_EOL;

    // Render methods:

    /**
     * Renders breadcrumbs by chaining 'a' elements with the separator
     * registered in the helper
     *
     * @param  Zend_Navigation_Container $container  [optional] container to
     *                                               render. Default is to
     *                                               render the container
     *                                               registered in the helper.
     * @return string                                helper output
     */
    public function renderStraight(Zend_Navigation_Container $container = null)
    {
        if (null === $container) {
            $container = $this->getContainer();
        }

        // find deepest active
        if (!$active = $this->findActive($container)) {
            return '';
        }

        $active = $active['page'];

        // put the deepest active page last in breadcrumbs
        if ($this->getLinkLast()) {
            $html = '<li class="active">' . $this->htmlify($active) . '</li>';
        } else {
            $html = $active->getLabel();
            if ($this->getUseTranslator() && $t = $this->getTranslator()) {
                $html = $t->translate($html);
            }
            $html = '<li class="active">' 
                  . $this->view->escape($html) 
                  . '</li>';
        }

        // walk back to root
        while ($parent = $active->getParent()) {
            if ($parent instanceof Zend_Navigation_Page) {
                // prepend crumb to html
                $html = '<li>' . $this->htmlify($parent) . '</li>'
                      . $this->getSeparator()
                      . $html;
            }

            if ($parent === $container) {
                // at the root of the given container
                break;
            }

            $active = $parent;
        }
        
        $html = '<ol class="breadcrumb">' . PHP_EOL . $html . PHP_EOL . '</ol>';
        
        return strlen($html) ? $this->getIndent() . $html : '';
    }
    
}
