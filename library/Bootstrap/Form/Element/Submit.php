<?php

/**
 * A form button submit definition
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * A form submit button
 *
 * @category Forms
 * @package Bootstrap_Form
 * @subpackage Element
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_Element_Submit extends Zend_Form_Element_Submit
{
    const BUTTON_DEFAULT = 'default';
    const BUTTON_PRIMARY = 'primary';
    const BUTTON_SUCCESS = 'success';
    const BUTTON_INFO = 'info';
    const BUTTON_WARNING = 'warning';
    const BUTTON_DANGER = 'danger';
    const BUTTON_LINK = 'link';
    
    const BUTTON_SIZE_LARGE = 'lg';
    const BUTTON_SIZE_DEFAULT = '';
    const BUTTON_SIZE_SMALL = 'sm';
    const BUTTON_SIZE_EXTRA_SMALL = 'xs';

    protected $buttons = array(
        self::BUTTON_DEFAULT,
        self::BUTTON_PRIMARY,
        self::BUTTON_SUCCESS,
        self::BUTTON_INFO,
        self::BUTTON_WARNING,
        self::BUTTON_DANGER,
        self::BUTTON_LINK
    );
    
    protected $sizes = array(
        self::BUTTON_SIZE_LARGE,
        self::BUTTON_SIZE_DEFAULT,
        self::BUTTON_SIZE_SMALL,
        self::BUTTON_SIZE_EXTRA_SMALL
    );
    
    protected $_blockLevel = false;

    /**
     * The left icon class that will be added if needed
     *
     * @var string
     */
    private $_iconLeft;
    
    /**
     * The right icon class that will be added if needed
     *
     * @var string
     */
    private $_iconRight;
    
    public function getAttribs()
    {
        $attribs = parent::getAttribs();
        unset($attribs['buttons'], $attribs['sizes']);
        return $attribs;
    }

    /**
     * Class constructor
     *
     * @param $spec
     * @param array $options
     */
    public function __construct($spec, $options = null)
    {
        if (!isset($options['class'])) {
            $options['class'] = '';
        }

        $classes = explode(' ', $options['class']);
        $classes[] = 'btn';

        if (isset($options['buttonType']) && in_array($options['buttonType'], $this->buttons)) {
            $classes[] = 'btn-' . $options['buttonType'];
            unset($options['buttonType']);
        }

        if (isset($options['size']) && in_array($options['size'], $this->sizes)) {
            $classes[] = 'btn-' . $options['size'];
            unset($options['size']);
        }

        if (isset($options['blockLevel']) && $options['blockLevel']) {
            $classes[] = 'btn-block';
        }

        if (isset($options['disabled'])) {
            $classes[] = 'disabled';
        }

        if (isset($options['active'])) {
            $classes[] = 'active';
        }
        
        if (isset($options['icon']) && !empty($options['icon'])) {
            $options['escape'] = false; // Disable automatic label escaping
            $this->_iconLeft = $options['icon'];
        }
        
        if (isset($options['iconLeft']) && !empty($options['iconLeft'])) {
            $options['escape'] = false; // Disable automatic label escaping
            $this->_iconLeft = $options['iconLeft'];
        }
        
        if (isset($options['iconRight']) && !empty($options['iconRight'])) {
            $options['escape'] = false; // Disable automatic label escaping
            $this->_iconRight = $options['iconRight'];
        }

        unset($options['iconLeft'], $options['iconRight'], $options['icon']);
        
        $classes = array_unique($classes);

        $options['class'] = trim(implode(' ', $classes));

        parent::__construct($spec, $options);
    }

    
    /**
     * Renders the icon tag
     *
     * @return string
     */
    private function _renderIcon($iconClass)
    {
        return !empty($iconClass) 
                ? '<span class="' . $iconClass . '"></span>' 
                : '';
    }

    /**
     * Gets the button label
     *
     * @return string
     */
    public function getLabel()
    {
        $label = parent::getLabel();
        
        // Render the icon on either side
        if (!empty($this->_iconLeft)) {
            $label = $this->_renderIcon($this->_iconLeft) . PHP_EOL . $label;
        }

        if (!empty($this->_iconRight)) {
            $label .= PHP_EOL . $this->_renderIcon($this->_iconRight);
        }
        
        return $label;
    }
    
}
