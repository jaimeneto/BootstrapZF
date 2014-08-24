<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initNavigation()
    {
        $container = new Zend_Navigation(
            include APPLICATION_PATH . '/configs/navigation.php'
        );
        
        Zend_Registry::set('Zend_Navigation', $container);
    }
    
}
