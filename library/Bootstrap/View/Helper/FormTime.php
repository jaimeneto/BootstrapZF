<?php

require_once 'Bootstrap/View/Helper/FormText.php';

class Bootstrap_View_Helper_FormTime extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'time';
    
    public function formTime($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
