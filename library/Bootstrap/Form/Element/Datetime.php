<?php

/**
 * A form datetime element definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * A form datetime element
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Datetime extends Bootstrap_Form_Element_Text
{
    public $helper = 'formDatetime';
    
    public function __construct($spec, $options = null)
    {
        if (!isset($options['local'])) {
            $options['local'] = true;
        }
     
//        $this->addValidator(new Zend_Validate_Date(array(
//            'format' => "yyyy-MM-dd'T'HH:mm"
//        )));
        
        parent::__construct($spec, $options);
    }
    
    /**
     * Retrieve local
     *
     * @return mixed
     */
    public function getLocal()
    {
        return $this->getAttrib('local');
    }

    /**
     * Set local
     *
     * @param mixed $boolean
     * @return self
     */
    public function setLocal($boolean)
    {
        $this->setAttrib('local', (bool) $boolean);
        return $this;
    }
}
