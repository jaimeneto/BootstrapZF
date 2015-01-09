<?php

require_once 'Bootstrap/View/Helper/FormText.php';

class Bootstrap_View_Helper_FormEmail extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'email';
    
    public function formEmail($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
