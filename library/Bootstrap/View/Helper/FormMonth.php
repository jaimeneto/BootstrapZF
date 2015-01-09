<?php

require_once 'Bootstrap/View/Helper/FormText.php';

class Bootstrap_View_Helper_FormMonth extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'month';
    
    public function formMonth($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
