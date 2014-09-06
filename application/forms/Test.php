<?php

class Application_Form_Test extends Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->setMethod('POST');
        
        $this->addElement('hidden', 'id', array('value' => 1));
        
        $this->addElement('text', 'text', array(
            'label'       => 'Text', 
            'required'    => true
        ));
        
        $this->addElement('password', 'password', array(
            'label'       => 'Password'
        ));
        
        $this->addElement('number', 'number', array(
            'label'       => 'Number',
            'min'         => 1,
            'max'         => 10
        ));
        
        $this->addElement('range', 'range', array(
            'label'       => 'Range',
            'min'         => 1,
            'max'         => 5,
            'prepend'     => 1,
            'append'      => 5
        ));
        
        $this->addElement('url', 'site', array(
            'label'       => 'Site'
        ));
        
        $this->addElement('email', 'email', array(
            'label'       => 'E-mail'
        ));
        
        $this->addElement('color', 'color', array(
            'label'       => 'Color'
        ));
        
        $this->addElement('date', 'date', array(
            'label'       => 'Date'
        ));
        
        $this->addElement('time', 'time', array(
            'label'       => 'Time'
        ));
        
        $this->addElement('datetime', 'datetime', array(
            'label'       => 'Datetime'
        ));
        
        $this->addElement('month', 'month', array(
            'label'       => 'Month'
        ));
        
        $this->addElement('week', 'week', array(
            'label'       => 'Week'
        ));
        
        $this->addElement('search', 'search', array(
            'label'       => 'Search',
        ));
        
        $this->addElement('checkbox', 'checkme', array(
            'label'    => 'Check on not check', 
        ));
        
        $this->addElement('multiCheckbox', 'checkallme', array(
            'label'        => 'Many options', 
            'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
            'inline'       => true
        ));
        
        $this->addElement('radio', 'radiobuttons', array(
            'label'        => 'Select one', 
            'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
            'inline'       => true
        ));
        
        $this->addElement('select', 'selectme', array(
            'label'        => 'Select here', 
            'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
        ));
        
        $this->addElement('staticText', 'uneditable', array(
            'label' => 'Static text', 
            'value' => 'You can not edit this text'
        ));
        
        $this->addElement('button', 'back', array(
            'label'      => 'Back', 
            'buttonType' => 'default',
            'iconLeft'   => 'glyphicon glyphicon-circle-arrow-left'
        ));
        
        $this->addElement('reset', 'reset', array(
            'label'      => 'Reset', 
            'buttonType' => 'default',
            'icon'       => 'glyphicon glyphicon-remove-circle'
        ));
        
        $this->addElement('submit', 'submit', array(
            'label'      => 'Submit', 
            'buttonType' => 'primary', 
            'iconLeft'   => 'glyphicon glyphicon-floppy-disk'
        ));
        
        $this->addDisplayGroup(array('back', 'reset', 'submit'), 'buttons', array(
            'decorators' => array(
                'FormElements', 
                array('HtmlTag', array(
                    'class' => 'col-sm-offset-2', 
                    'tag' => 'div')
                )
            ),
        ));
    }
}
