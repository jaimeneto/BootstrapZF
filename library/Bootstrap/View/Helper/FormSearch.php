<?php

require_once 'Bootstrap/View/Helper/FormText.php';

class Bootstrap_View_Helper_FormSearch extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'search';
    
    public function formSearch($name, $value = null, $attribs = null)
    {
        return $this->formText($name, $value, $attribs);
    }
    
}
