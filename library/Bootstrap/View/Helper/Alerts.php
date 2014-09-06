<?php

/**
 * View helper definition
 *
 * @category ViewHelpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Helper to generate a list of alerts with the Bootstrap UI.
 *
 * @category ViewHelpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_Alerts extends Zend_View_Helper_Abstract
{
    public function alerts($closeButton=true, $uniqueMessages=true,
        $id='alerts')
    {
        $helper = Zend_Controller_Action_HelperBroker::getStaticHelper('Alerts');

        $messages = $helper->getMessages();

        if ($uniqueMessages) {
            $this->uniqueMessages($messages);
        }

        if (count($messages) < 1) {
            return '';
        }
        
        $html = '<ul class="list-unstyled"';

        if ($id) {
            $html .= ' id="' . $this->view->escape($id) . '"';
        }

        $html .= '>' . PHP_EOL;

        foreach($messages as $message) {
            $html .= $this->view->alert($message['text'], $message['type'], 
                                $closeButton, $message['escape'], $tag='li');
        }
        $html .= '</ul>';
        return $html;
    }

    public function uniqueMessages(array &$messages)
    {
        $stringMessages = array();
        if ($messages) {
            foreach($messages as $key => $message) {
                $stringMessages[$key] = $message['type'] 
                                      . ' - '
                                      . $message['text'];
            }
            $keepKeys = array_keys(array_unique($stringMessages));
            $allKeys = array_keys($messages);
            $delKeys = array_diff($allKeys, $keepKeys);

            foreach($delKeys as $key) {
                unset($messages[$key]);
            }
        }
    }

}
