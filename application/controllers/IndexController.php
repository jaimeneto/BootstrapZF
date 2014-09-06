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
        $form = new Application_Form_Test();

        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            if ($form->isValid($data)) {
                $this->getHelper('Alerts')->addSuccess('<strong>Success: </strong>Data successfully submited', false);
            } else {
                $this->getHelper('Alerts')->addDanger('<strong>Error: </strong>The form contain errors', false);
            }
        } else {
            $this->getHelper('Alerts')->addInfo('<strong>Info: </strong>Submit the form to see an alert', false);
        }
        
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
