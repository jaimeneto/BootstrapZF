<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initNavigation()
    {
        $container = new Zend_Navigation(array(
            array(
                'label' => 'Home',
                'id'    => 'home-link',
                'uri'   => '/',
                'icon'  => 'glyphicon glyphicon-home'
            ),
            array(
                'label' => 'Zend',
                'uri' => 'http://www.zend-project.com/',
                'order' => 100
            ),
            array(
                'label' => 'Page 2',
                'controller' => 'page2',
                'active' => true,
                'pages' => array(
                    array(
                        'label' => 'Page 2.1',
                        'action' => 'page2_1',
                        'controller' => 'page2',
                        'class' => 'special-one',
                        'title' => 'This element has a special class',
                        'active' => true,
                        'icon'  => 'glyphicon glyphicon-star'
                    ),
                    array(
                        'label' => 'Page 2.2',
                        'action' => 'page2_2',
                        'controller' => 'page2',
                        'class' => 'special-two',
                        'title' => 'This element has a special class too'
                    ),
                    array(
                        'label' => 'divider',
                        'action' => '#',
                    ),
                    array(
                        'label' => 'Page 2.3',
                        'action' => 'page2_3',
                        'controller' => 'page2',
                        'class' => 'special-two',
                        'title' => 'This element has a special class too'
                    )
                )
            ),
            array(
                'label' => 'Page 3',
                'action' => 'index',
                'controller' => 'index',
                'module' => 'mymodule',
                'reset_params' => false
            ),
        ));
        
        Zend_Registry::set('Zend_Navigation', $container);
    }
    
}
