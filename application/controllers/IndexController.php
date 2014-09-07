<?php

/**
 * Description of IndexController
 *
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class IndexController extends Zend_Controller_Action
{
    
    public function indexAction()
    {
        $this->_helper->redirector('manual');
    }
    
    public function tutorialAction()
    {
        $form = new Application_Form_Test();

        $this->_helper->alerts('This is a direct message', 'success', true);
        $this->getHelper('Alerts')->addMessage('This is a message using addMessage().', 'alert', true);
        $this->getHelper('Alerts')->addAlert('<strong>Alert: </strong>This is an alert message using addAlert().', false);
        $this->getHelper('Alerts')->addSuccess('<strong>Success: </strong>This is a success message using addSuccess().', false);
        $this->getHelper('Alerts')->addInfo('<strong>Info: </strong>This is an info message using addInfo().', false);
        $this->getHelper('Alerts')->addWarning('<strong>Success: </strong>This is an warning message using addWarning().', false);
        $this->getHelper('Alerts')->addDanger('<strong>Success: </strong>This is a danger message using addDanger().', false);
        
        $carousel = array(
            array(
                'src'           => $this->view->baseUrl('img/carousel-1.jpg'),
                'caption-title' => 'First slide label',
                'caption'       => 'Nulla vitae elit libero, a pharetra augue mollis interdum.',
                'alt'           => '900x500'
            ),
            array(
                'src'           => $this->view->baseUrl('img/carousel-2.jpg'),
                'caption-title' => 'Second slide label',
                'caption'       => 'Nulla vitae elit libero, a pharetra augue mollis interdum.',
                'alt'           => '900x500'
            ),
            array(
                'src'           => $this->view->baseUrl('img/carousel-3.jpg'),
                'caption-title' => 'Third slide label',
                'caption'       => 'Nulla vitae elit libero, a pharetra augue mollis interdum.',
                'alt'           => '900x500'
            ),    
        );
        
        $paginator = Zend_Paginator::factory(array(
            0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,
            0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,
            0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20
        ));
        $paginator->setItemCountPerPage(5);
        $paginator->setCurrentPageNumber($this->_getParam('p', 1));
        
        $this->view->carousel = $carousel;
        $this->view->paginator = $paginator;        
        $this->view->form = $form;
    }
    
}
