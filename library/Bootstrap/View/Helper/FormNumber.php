<?php

require_once 'Bootstrap/View/Helper/FormText.php';

class Bootstrap_View_Helper_FormNumber extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'number';
    
    public function formNumber($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
