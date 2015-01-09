<?php
/**
 * Form class definition
 *
 * @category Forms
 * @package Bootstrap
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/Form.php';

/**
 * Form for the Bootstrap UI
 *
 * @category Forms
 * @package Bootstrap
 * @author Jaime Neto <contato@jaimeneto.com>
 */
abstract class Bootstrap_Form extends Zend_Form
{
    /**
     * Class constants
     */
    const DISPOSITION_HORIZONTAL = 'horizontal';
    const DISPOSITION_INLINE     = 'inline';

    protected $_prefixesInitialized = false;
    
    /**
     * Override the base form constructor.
     *
     * @param null $options
     */
    public function __construct($options = null)
    {
        $this->_initializePrefixes();
        $this->setDecorators(array(
            'FormElements',
            'Form'
        ));
        
        $options['role'] = 'form';
        
        parent::__construct($options);
    }

    protected function _initializePrefixes()
    {
        if (!$this->_prefixesInitialized) {
            if (null !== $this->getView()) {
                $this->getView()->addHelperPath(
                        'Bootstrap/View/Helper',
                        'Bootstrap_View_Helper'
                );
            }

            $this->addPrefixPath(
                    'Bootstrap_Form_Element',
                    'Bootstrap/Form/Element',
                    'element'
            );

            $this->addElementPrefixPath(
                    'Bootstrap_Form_Decorator',
                    'Bootstrap/Form/Decorator',
                    'decorator'
            );

            $this->addDisplayGroupPrefixPath(
                    'Bootstrap_Form_Decorator',
                    'Bootstrap/Form/Decorator'
            );

            $this->setDefaultDisplayGroupClass('Bootstrap_Form_DisplayGroup');

            $this->_prefixesInitialized = true;
        }
    }

    /**
     * Adds default decorators if none are specified in the options and then calls Zend_Form::createElement()
     * (non-PHPdoc)
     * @see Zend_Form::createElement()
     */
    public function createElement($type, $name, $options = null)
    {
        // If we haven't specified our own decorators, add the default ones in.
        if (is_array($this->_elementDecorators)) {
            if (null === $options) {
                $options = array('decorators' => $this->_elementDecorators);
            } elseif ($options instanceof Zend_Config) {
                $options = $options->toArray();
            }

            if (is_array($options) && !array_key_exists('decorators', $options)) {
                $options['decorators'] = $this->_elementDecorators;
            }
        }

        // no decorators for hidden elements
        if (in_array($type, array('hidden', 'hash'))) {
            $options['decorators'] = array('ViewHelper');
        }

        return parent::createElement($type, $name, $options);
    }

    /**
     * @param string $disposition
     */
    public function setDisposition($disposition)
    {
        if (
            in_array(
                $disposition,
                array(
                    self::DISPOSITION_HORIZONTAL,
                    self::DISPOSITION_INLINE
                )
            )
        ) {
            $this->_addClassNames('form-' . $disposition);
        }
    }

    /**
     * Adds a class name
     *
     * @param string $classNames
     */
    protected function _addClassNames($classNames)
    {
        $classes = $this->_getClassNames();

        foreach ((array) $classNames as $className) {
            $classes[] = $className;
        }

        $this->setAttrib('class', trim(implode(' ', array_unique($classes))));
    }

    /**
     * Removes a class name
     *
     * @param string $classNames
     */
    protected function _removeClassNames($classNames)
    {
        $this->setAttrib('class', trim(implode(' ', array_diff($this->_getClassNames(), (array) $classNames))));
    }

    /**
     * Extract the class names from a Zend_Form_Element if given or from the
     * base form
     *
     * @param  Zend_Form_Element $element
     * @return array
     */
    protected function _getClassNames(Zend_Form_Element $element = null)
    {
        if (null !== $element) {
            return explode(' ', $element->getAttrib('class'));
        }

        return explode(' ', $this->getAttrib('class'));
    }

    /**
     * Render form
     *
     * @param  Zend_View_Interface $view
     * @return string
     */
    public function render(Zend_View_Interface $view = null)
    {
        /**
         * Getting elements.
         */
        $elements = $this->getElements();

        foreach ($elements as $element) {
            /**
             * Removing label from buttons before render.
             */
            if ($element instanceof Zend_Form_Element_Submit 
                    || $element instanceof Zend_Form_Element_Hidden) {
                $element->clearDecorators()->addDecorator('ViewHelper');
            }
            
            if ($element instanceof Zend_Form_Element_Checkbox) {
                $this->_customizeCheckboxElement($element);
            }
            
            if ($element instanceof Zend_Form_Element_File) {
                $this->_customizeFileElement($element);
            }
        }

        /**
         * Rendering.
         */
        return parent::render($view);
    }

    abstract protected function _customizeCheckboxElement(&$element);
    
    protected function _customizeFileElement(&$element)
    {
        $decorators = $element->getDecorators();
        $newDecorators = array();
        foreach($decorators as $name => $decorator) {
            if ($name == 'Zend_Form_Decorator_ViewHelper') {
                $name = 'Zend_Form_Decorator_File';
                $decorator = new $name;
            }
            $newDecorators[$name] = $decorator;
        }
        
        $element->setDecorators($newDecorators);
    }
}
