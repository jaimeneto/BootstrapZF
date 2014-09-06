<?php

/**
 * Description of PaginationTest
 *
 * @author Jaime Neto
 */
class Bootstrap_View_Helper_PaginationTest extends PHPUnit_Framework_TestCase
{   
    private $paginator;
    private $helper;
    
    protected function setUp()
    {
        $this->paginator = Zend_Paginator::factory(array(
            0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,
            0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,
            0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20
        ));
        $this->paginator->setItemCountPerPage(5);
        $this->paginator->setCurrentPageNumber(1);
        
        Zend_Controller_Front::getInstance()->getRouter()->addDefaultRoutes();
        
        $view = new Zend_View();
        $view->paginator = $this->paginator;
        
        $this->helper = new Bootstrap_View_Helper_Pagination();
        $this->helper->setView($view);
    }
    
    public function testGerarPaginacaoSemParametros()
    {
        $expected = '<ul class="pagination">' . PHP_EOL
                  . '<li class="disabled"><span>&laquo;</span></li>' . PHP_EOL
                  . '<li class="disabled"><span>&lsaquo;</span></li>' . PHP_EOL
                  . '<li class="active"><a href="/index/index/page/1">1</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/page/2">2</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/page/3">3</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/4">4</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/5">5</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/6">6</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/7">7</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/8">8</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/9">9</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/10">10</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/2">&rsaquo;</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/page/13">&raquo;</a></li>' . PHP_EOL 
                  . '</ul>';
        
        $actual = $this->helper->pagination($this->paginator);
        
        $this->assertEquals($expected, $actual);
    }
    
    public function testGerarPaginacaoComParametros()
    {
        $this->paginator->setCurrentPageNumber(2);
        
        $expected = '<ul class="pagination pagination-sm">' . PHP_EOL
                  . '<li><a href="/index/index/p/1">&laquo;</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/p/1">&lsaquo;</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/p/1">1</a></li>' . PHP_EOL
                  . '<li class="active"><a href="/index/index/p/2">2</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/p/3">3</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/4">4</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/5">5</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/6">6</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/7">7</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/8">8</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/9">9</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/10">10</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/3">&rsaquo;</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/13">&raquo;</a></li>' . PHP_EOL 
                  . '</ul>';
        
        $actual = $this->helper->pagination($this->paginator, 'p', 'small');
        
        $this->assertEquals($expected, $actual);
    }
    
    public function testGerarPaginacaoSemPassarOPaginatorComoParametro()
    {    
        $this->paginator->setCurrentPageNumber(13);
        
        $expected = '<ul class="pagination pagination-lg">' . PHP_EOL
                  . '<li><a href="/index/index/p/1">&laquo;</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/p/12">&lsaquo;</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/p/4">4</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/p/5">5</a></li>' . PHP_EOL
                  . '<li><a href="/index/index/p/6">6</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/7">7</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/8">8</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/9">9</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/10">10</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/11">11</a></li>' . PHP_EOL 
                  . '<li><a href="/index/index/p/12">12</a></li>' . PHP_EOL 
                  . '<li class="active"><a href="/index/index/p/13">13</a></li>' . PHP_EOL 
                  . '<li class="disabled"><span>&rsaquo;</span></li>' . PHP_EOL 
                  . '<li class="disabled"><span>&raquo;</span></li>' . PHP_EOL 
                  . '</ul>';
        
        $actual = $this->helper->pagination(null, 'p', 'lg');
        
        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException   Bootstrap_View_Exception
     */
    public function testGerarExcessaoSeNaoTiverPaginatorNaViewNemNoParametro()
    {
        $helper = new Bootstrap_View_Helper_Pagination();
        $helper->setView(new Zend_View());
        $helper->pagination();
    }
    
}
