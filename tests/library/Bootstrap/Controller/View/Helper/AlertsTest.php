<?php

/**
 * Description of AlertTest
 *
 * @author Jaime Neto
 */
class Bootstrap_View_Helper_AlertsTest extends PHPUnit_Framework_TestCase
{   
    private $actionHelper;
    private $viewHelper;
    
    protected function setUp()
    {
        $this->actionHelper = new Bootstrap_Controller_Action_Helper_Alerts();
        $this->actionHelper->addAlert('Alert')
                           ->addWarning('Warning')
                           ->addWarning('Warning');
        
        $view = new Zend_View();
        $view->addBasePath(APPLICATION_PATH . '/../library/Bootstrap/View', 
                'Bootstrap_View');
        
        $this->viewHelper = new Bootstrap_View_Helper_Alerts();
        $this->viewHelper->setView($view);
    }
    
    public function testGerarListaDeMensagens()
    {
        $expected = '<ul class="list-unstyled" id="messages">' . PHP_EOL
                  . '<li class="alert" role="alert">Alert</li>' . PHP_EOL
                  . '<li class="alert alert-warning" role="alert">Warning</li>' 
                  . PHP_EOL . '</ul>';
        
        $this->assertEquals($expected, $this->viewHelper->alerts(false, true, 
                'messages'));
    }
    
    public function testSeNaoTiverMensagensRetornarStringVazio()
    {
        $this->actionHelper->cleanMessages();
        $this->assertEquals('', $this->viewHelper->alerts());
    }
    
}
