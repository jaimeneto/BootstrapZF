<?php

class Bootstrap_View_Helper_FormDatetime extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'datetime';
    
    public function formDatetime($name, $value = null, $attribs = null)
    {
        if (isset($attribs['local']) && $attribs['local']) {
            $this->_inputType = 'datetime-local';
        }
        unset($attribs['local']);
        
        return $this->formText($name, $value, $attribs);
    }
    
}
