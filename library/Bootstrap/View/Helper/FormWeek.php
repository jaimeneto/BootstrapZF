<?php

class Bootstrap_View_Helper_FormWeek extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'week';
    
    public function formWeek($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
