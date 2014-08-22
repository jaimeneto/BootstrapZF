<?php
/**
 * A custom display group definition for Bootstrap forms
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Displays the fieldsets the Bootstrap's way
 *
 * @category Forms
 * @package Bootstrap
 * @subpackage Form
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Form_DisplayGroup extends Zend_Form_DisplayGroup
{
    /**
     * Override the default decorators
     *
     * @return Bootstrap_Form_DisplayGroup
     */
    public function loadDefaultDecorators()
    {
        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return $this;
        }

        $decorators = $this->getDecorators();
        if (empty($decorators)) {
            $this->addDecorator('FormElements')
                 ->addDecorator('Fieldset');
        }

        return $this;
    }

}
