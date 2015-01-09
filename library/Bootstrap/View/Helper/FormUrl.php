<?php

require_once 'Bootstrap/View/Helper/FormText.php';

class Bootstrap_View_Helper_FormUrl extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'url';
    
        
    public function formUrl($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
