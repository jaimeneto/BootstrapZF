<?php

class Bootstrap_View_Helper_FormDate extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'date';
    
    public function formDate($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
