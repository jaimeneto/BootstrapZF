<?php
/**
 * Action helper definition
 *
 * @category Plugins
 * @package Bootstrap_Controller_Action
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

require_once 'Zend/Session.php';
require_once 'Zend/Controller/Action/Helper/Abstract.php';

/**
 * Adds messages to session, implementing the PRG pattern (Post/Get/Redirect).
 * 
 * @category Plugins
 * @package Bootstrap_Controller_Action
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_Controller_Action_Helper_Alerts 
    extends Zend_Controller_Action_Helper_Abstract 
    implements Countable
{

    /**
     * Constante utilizada para denotar uma mensagem de alerta
     */
    const ALERT = 'ALERT';
    
    /**
     * Constante utilizada para denotar uma mensagem de sucesso
     */
    const SUCCESS = 'SUCCESS';

    /**
     * Constante utilizada para denotar uma mensagem informativa
     */
    const INFO = 'INFO';

    /**
     * Constante utilizada para denotar uma mensagem de aviso
     */
    const WARNING = 'WARNING';

    /**
     * Constante utilizada para denotar uma mensagem de erro
     */
    const DANGER = 'DANGER';

    /**
     * Array com os tipos de mensagem permitidos
     * @var Array
     */
    private static $_types = array(
        self::ALERT,
        self::SUCCESS,
        self::INFO,
        self::WARNING,
        self::DANGER
    );

    /**
     * Namespace de sessao utilizado para as mensagens
     * @var Zend_Session_Namespace
     */
    protected $_namespace;

    /**
     * Inicializa o namespace de sessao
     */
    public function __construct()
    {
        $this->_namespace = new Zend_Session_Namespace($this->getName());
        if (!isset($this->_namespace->messages)) {
            $this->_namespace->messages = array();
        }
    }

    /**
     * Metodo comum para adicionar mensagens a sessao
     *
     * @param string $text  Mensagem
     * @param string $type  Tipo
     * @param boolean $escape
     * @return void
     * @throws InvalidArgumentException Se a mensagem nao for uma string ou
     *      se o tipo de mensagem informado for invalido
     */
    public function addMessage($text, $type = self::ALERT, $escape = true)
    {
        if (!(is_string($text) && in_array(strtoupper($type), self::$_types))) {
            throw new InvalidArgumentException();
        }

        $message = array(
            'text' => $text,
            'type' => $type,
            'escape' => $escape
        );

        $this->_namespace->messages[] = $message;
        return $this;
    }

    /**
     * Adicionar uma mensagem de sucesso
     *
     * @param string $msg   Mensagem
     * @param boolean $escape
     * @return void
     */
    public function addSuccess($msg, $escape = true)
    {
        return $this->addMessage($msg, self::SUCCESS, $escape);
    }

    /**
     * Adicionar uma mensagem de informacao
     *
     * @param string $msg   Mensagem
     * @param boolean $escape
     * @return void
     */
    public function addInfo($msg, $escape = true)
    {
        return $this->addMessage($msg, self::INFO, $escape);
    }

    /**
     * Adicionar uma mensagem de alerta
     *
     * @param string $msg   Mensagem
     * @param boolean $escape
     * @return void
     */
    public function addAlert($msg, $escape = true)
    {
        return $this->addMessage($msg, self::ALERT, $escape);
    }
    
    /**
     * Adicionar uma mensagem de aviso
     *
     * @param string $msg   Mensagem
     * @param boolean $escape
     * @return void
     */
    public function addWarning($msg, $escape = true)
    {
        return $this->addMessage($msg, self::WARNING, $escape);
    }

    /**
     * Adicionar uma mensagem de perigo
     *
     * @param string $msg   Mensagem
     * @param boolean $escape
     * @return void
     */
    public function addDanger($msg, $escape = true)
    {
        return $this->addMessage($msg, self::DANGER, $escape);
    }

    /**
     * Alias for addDanger
     */
    public function addError($msg, $escape = true)
    {
        return $this->addDanger($msg, $escape);
    }
    
    /**
     * Retorna as mensagens atualmente adicionada a sessao
     *
     * @param string $type   Tipo de mensagem
     * @return array
     */
    public function getMessages($type = null, $cleanMessages = true)
    {
        if ($type === null) {
            $messages = $this->_namespace->messages;
            if ($cleanMessages) {
                $this->cleanMessages();
            }
            return $messages;
        }

        if (!in_array($type, self::$_types)) {
            throw new InvalidArgumentException();
        }

        $messages = array();

        $n = count($this->_namespace->messages);
        for ($i = 0; $i < $n; $i++) {
            $message = & $this->_namespace->messages[$i];

            if ($message['type'] == $type) {
                $messages[] = $message;
                if ($cleanMessages) {
                    unset($this->_namespace->messages[$i]);
                }
            }
        }

        return $messages;
    }

    /**
     * Apaga as mensagens atualmente adicionadas a sessao
     *
     * @param string $type   Tipo de mensagem
     * @return void
     */
    public function cleanMessages($type = null)
    {
        $messages = array();
        if ($type) {
            foreach($this->_namespace->messages as $message) {
                if ($message['type'] != $type) {
                    $messages[] = $message;
                }
            }
        }
        $this->_namespace->messages = $messages;
    }

    /**
     * Implements the Countable interface
     *
     * @return int  Quantidade de mensagens armazenadas na sessao
     */
    public function count()
    {
        return count($this->_namespace->messages);
    }

    /**
     * Strategy pattern: proxy to addMessage()
     */
    public function direct($text, $type = self::ALERT, $escape = true)
    {
        return $this->addMessage($text, $type, $escape);
    }

}
