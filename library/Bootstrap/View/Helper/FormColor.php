<?php

require_once 'Bootstrap/View/Helper/FormText.php';

class Bootstrap_View_Helper_FormColor extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'color';
    
    public function formColor($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
