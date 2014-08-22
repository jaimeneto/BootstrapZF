<?php

/**
 * View helper definition
 *
 * @category Menus
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Helper to generate a navbar with the Bootstrap UI.
 *
 * @category Menus
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_Navbar
    extends Zend_View_Helper_Navigation_Menu
{
    protected $_tagAttribs = array(
        'class',
        'title',
        'target',
        'accesskey',
        'rel',
        'rev'
    );

    public function navbar(Zend_Navigation_Container $container = null)
    {
        if (null !== $container) {
            $this->setContainer($container);
        }

        return $this;
    }
    
    public function renderNavbar(Zend_Navigation_Container $container = null,
        array $options = array())
    {
        if (null === $container) {
            $container = $this->getContainer();
        }

        $html = array('<ul class="nav navbar-nav">');

//        $acl = Zend_Registry::isRegistered('Zend_Acl')
//            ? Zend_Registry::get('Zend_Acl')
//            : null;
//        
//        $role = $this->getRole();

        foreach ($container as $page) {            
            // visibility of the page
            if (!$page->isVisible()
//                || ($acl && !$acl->isAllowed($role, $page->getResource()))
            ) {
                continue;
            }

            // dropdown
            $dropdown = !empty($page->pages);

            $attribs = array(
                'href="' . ($dropdown ? '#' : $page->getHref()) . '"'
            );

            foreach($this->_tagAttribs as $attr) {
                if ($attr == 'class') {
                    $classes=array();
                    if ($dropdown) {
                        $classes[] = 'dropdown-toggle';
                        $attribs[] = 'data-toggle="dropdown"';
                    }
                    if ($page->class) {
                        $classes[] = $page->class;
                    }
                    $attribs[] = $classes 
                               ? 'class="' . implode(' ', $classes) . '"'
                               : '';
                } else if ($page->$attr) {
                    $attribs[] = $attr . '="' . $page->$attr . '"';
                }
            }

            $liClasses = array();
            if ($page->isActive()) {
                $liClasses[] = 'active';
            }
            
            if ($dropdown) {
                $liClasses[] = 'dropdown';
            }
            
            // header
            $html[] = '<li' . ($liClasses 
                    ? ' class="' . implode(' ', $liClasses) . '"' 
                    : '') . '>';
            $html[] = '<a ' . implode(' ', $attribs) . '>';
            
            if ($page->get('icon')) {
                $html[] = '<span class="' . $page->get('icon') . '"></span>';
            }
            
            $html[] = $page->getLabel();

            if ($dropdown) {
                $html[] = '<span class="caret"></span>';
            }

            $html[] = '</a>';

            if (!$dropdown) {
                $html[] = '</li>';
                continue;
            }

            $html[] = '<ul class="dropdown-menu" role="menu">';

            foreach ($page->pages as $subpage) {
                // visibility of the sub-page
                if (!$subpage->isVisible()
//                    || ($acl && !$acl->isAllowed($role, $subpage->getResource()))
                ) {
                    continue;
                }
                if ($subpage->getLabel() == 'divider') {
                    $html[] = '<li class="divider"></li>';
                    continue;
                }
                $html[] = '<li' . ($subpage->isActive() 
                        ? ' class="active"' 
                        : '') . '>';
                $html[] = '<a href="' . $subpage->getHref() . '">';

                if ($subpage->get('icon')) {
                    $html[] = '<span class="' . $subpage->get('icon') . '"></span>';
                }

                $html[] = $subpage->getLabel();
                $html[] = '</a>';
                $html[] = '</li>';
            }

            $html[] = '</ul>';
            $html[] = '</li>';
        }

        $html[] = '</ul>';

        return implode(PHP_EOL, $html);
    }

    public function render(Zend_Navigation_Container $container = null)
    {
        $partial = $this->getPartial();
        if ($partial) {
            return $this->renderPartial($container, $partial);
        } else {
            return $this->renderNavbar($container);
        }
    }
    
}
