<?php

/**
 * Description of AlertTest
 *
 * @author Jaime Neto
 */
class Bootstrap_View_Helper_AlertTest extends PHPUnit_Framework_TestCase
{   
    private $helper;
    
    protected function setUp()
    {
        $this->helper = new Bootstrap_View_Helper_Alert();
        $this->helper->setView(new Zend_View());
    }
    
    public function testGerarMensagemDeAlertaPadrao()
    {
        $expected = '<div class="alert alert-dismissible" role="alert">' 
                  . PHP_EOL
                  . '<button type="button" class="close" data-dismiss="alert">' 
                  . '<span aria-hidden="true">&times;</span></button>' 
                  . PHP_EOL 
                  . 'Mensagem Teste</div>' . PHP_EOL;
        
        $this->assertEquals($expected, $this->helper->alert('Mensagem Teste'));
    }
    
    public function testGerarMensagemAlterandoOsParametros()
    {
        $expected = '<p class="alert alert-success" role="alert">' 
                  . 'Mensagem com <a>link</a></p>' . PHP_EOL;
        $this->assertEquals($expected, $this->helper->alert(
                'Mensagem com <a>link</a>', 'SUCCESS', false, false, 'p'));
    }

    public function testGerarMensagemPassandoTipoEmMinusculo()
    {
        $expected = '<div class="alert alert-danger" role="alert">' 
                  . 'Mensagem Teste</div>' . PHP_EOL;
        $this->assertEquals($expected, $this->helper->alert('Mensagem Teste', 
                'danger', false));
    }
    
    public function testGerarMensagemDoTipoPadraoAoPassarTipoInvalido()
    {
        $expected = '<div class="alert" role="alert">' 
                  . 'Mensagem Teste</div>' . PHP_EOL;
        $this->assertEquals($expected, $this->helper->alert('Mensagem Teste', 
                'OUTRO', false));
    }
    
}
