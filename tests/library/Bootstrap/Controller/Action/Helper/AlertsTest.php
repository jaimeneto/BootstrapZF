<?php

/**
 * Description of AlertsTest
 *
 * @author Jaime Neto
 */
class Bootstrap_Controller_Action_Helper_AlertsTest extends PHPUnit_Framework_TestCase
{

    private $helper;
    
    protected function setUp()
    {
        $this->helper = new Bootstrap_Controller_Action_Helper_Alerts();
    }
    
    public function testAdicionarERecuperarMensagens()
    {
        $this->helper->addAlert('alert message')
                     ->addWarning('warning message')
                     ->addDanger('danger message')
                     ->addInfo('<span>info message</span>')
                     ->addSuccess('success message')
                     ->direct('direct message');

        $this->assertEquals(6, $this->helper->count());

        $this->assertEquals(array(
            0 => array('text' => 'alert message', 'type' => 'ALERT', 'escape' => true),
            1 => array('text' => 'direct message', 'type' => 'ALERT', 'escape' => true),
        ), $this->helper->getMessages('ALERT', false));

        $this->assertEquals(array(
            array('text' => 'danger message', 'type' => 'DANGER', 'escape' => true),
        ), $this->helper->getMessages('DANGER', true));
        
        $this->assertEquals(array(
            0 => array('text' => 'alert message', 'type' => 'ALERT', 'escape' => true),
            1 => array('text' => 'warning message', 'type' => 'WARNING', 'escape' => true),
//            2 => array('text' => 'danger message', 'type' => 'DANGER', 'escape' => true),
            3 => array('text' => '<span>info message</span>', 'type' => 'INFO', 'escape' => true),
            4 => array('text' => 'success message', 'type' => 'SUCCESS', 'escape' => true),
            5 => array('text' => 'direct message', 'type' => 'ALERT', 'escape' => true),
        ), $this->helper->getMessages());
        
        $this->assertEmpty($this->helper->getMessages());
    }
        
    /**
     * @expectedException   InvalidArgumentException
     */
    public function testSeAdicionarMensagemComTipoInvalidoJogaUmaExcessao()
    {
        $this->helper->addMessage('teste', 'OUTRO');
    }
    
    /**
     * @expectedException   InvalidArgumentException
     */
    public function testSeTentarRetornarMensagensDeTipoInvalidoJogaUmaExcessao()
    {
        $this->helper->getMessages('OUTRO');
    }
    
}
