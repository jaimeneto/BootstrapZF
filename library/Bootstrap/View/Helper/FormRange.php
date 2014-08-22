<?php

class Bootstrap_View_Helper_FormRange extends Bootstrap_View_Helper_FormText
{
    protected $_inputType = 'range';
    
    public function formRange($name, $value = null, $attribs = null)
    {
//        if (isset($attribs['class']) 
//                && strstr($attribs['class'], 'form-control')) {
//            $attribs['class'] = trim(
//                    str_replace('form-control', '', $attribs['class'])
//                );
//            if ($attribs['class'] == '') {
//                unset($attribs['class']);
//            }
//        }
        
        return $this->formText($name, $value, $attribs);
    }
    
}
