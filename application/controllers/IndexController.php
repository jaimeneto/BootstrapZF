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
        $form = new Bootstrap_Form_Horizontal();
        $form->setMethod('POST');
        
        $form->addElement('hidden', 'id', array('value' => 1));
        
        $form->addElement('text', 'text', array(
            'label'       => 'Text', 
            'required'    => true
        ));
        
        $form->addElement('password', 'password', array(
            'label'       => 'Password'
        ));
        
        $form->addElement('number', 'number', array(
            'label'       => 'Number',
            'min'         => 1,
            'max'         => 10
        ));
        
        $form->addElement('range', 'range', array(
            'label'       => 'Range',
            'min'         => 1,
            'max'         => 5,
            'prepend'     => 1,
            'append'      => 5
        ));
        
        $form->addElement('url', 'site', array(
            'label'       => 'Site'
        ));
        
        $form->addElement('email', 'email', array(
            'label'       => 'E-mail'
        ));
        
        $form->addElement('color', 'color', array(
            'label'       => 'Color'
        ));
        
        $form->addElement('date', 'date', array(
            'label'       => 'Date'
        ));
        
        $form->addElement('time', 'time', array(
            'label'       => 'Time'
        ));
        
        $form->addElement('datetime', 'datetime', array(
            'label'       => 'Datetime'
        ));
        
        $form->addElement('month', 'month', array(
            'label'       => 'Month'
        ));
        
        $form->addElement('week', 'week', array(
            'label'       => 'Week'
        ));
        
        $form->addElement('search', 'search', array(
            'label'       => 'Search',
        ));
        
        $form->addElement('checkbox', 'checkme', array(
            'label'    => 'Check on not check', 
        ));
        
        $form->addElement('multiCheckbox', 'checkallme', array(
            'label'        => 'Many options', 
            'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
            'inline'       => true
        ));
        
        $form->addElement('radio', 'radiobuttons', array(
            'label'        => 'Select one', 
            'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
            'inline'       => true
        ));
        
        $form->addElement('select', 'selectme', array(
            'label'        => 'Select here', 
            'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
        ));
        
        $form->addElement('staticText', 'uneditable', array(
            'label' => 'Static text', 
            'value' => 'You can not edit this text'
        ));
        
        $form->addElement('button', 'back', array(
            'label'      => 'Back', 
            'buttonType' => 'default',
            'iconLeft'   => 'glyphicon glyphicon-circle-arrow-left'
        ));
        
        $form->addElement('reset', 'reset', array(
            'label'      => 'Reset', 
            'buttonType' => 'default',
            'icon'       => 'glyphicon glyphicon-remove-circle'
        ));
        
        $form->addElement('submit', 'submit', array(
            'label'      => 'Submit', 
            'buttonType' => 'primary', 
            'iconLeft'   => 'glyphicon glyphicon-floppy-disk'
        ));
        
        if ($this->getRequest()->isPost() && !$form->isValid($this->getRequest()->getPost())) {
            $this->getHelper('Alerts')->addDanger('Dados inválidos ou faltando');
        }
        
        $this->view->form = $form;
    }
    
}
