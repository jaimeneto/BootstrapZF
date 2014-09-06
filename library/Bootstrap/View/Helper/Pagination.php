<?php
/**
 * View helper definition
 *
 * @category Pagination
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */

/**
 * Helper to generate a pagination element in Bootstrap's format.
 *
 * @category Pagination
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_Pagination
        extends Zend_View_Helper_PaginationControl
{
    private $_sizes = array(
        'large'   => ' pagination-lg',
        'lg'      => ' pagination-lg',
        'default' => '',
        'small'   => ' pagination-sm',
        'sm'      => ' pagination-sm',
    );
    
    /**
     * Render the provided pages.  This checks if $view->paginator is set and,
     * if so, uses that.  Also, if no scrolling style or partial are specified,
     * the defaults will be used (if set).
     *
     * @param  Zend_Paginator (Optional) $paginator
     * @param  array|string $params (Optional) params to pass to the partial
     * @return string
     * @throws Zend_View_Exception
     */
    public function pagination(Zend_Paginator $paginator = null, 
            $pageParam = 'page', $size = 'default')
    {
        if ($paginator === null) {
            if (isset($this->view->paginator) 
                    && $this->view->paginator !== null 
                    && $this->view->paginator instanceof Zend_Paginator) {
                $paginator = $this->view->paginator;
            } else {
                /**
                 * @see Zend_View_Exception
                 */
                require_once 'Zend/View/Exception.php';

                $e = new Zend_View_Exception('No paginator instance provided or incorrect type');
                $e->setView($this->view);
                throw $e;
            }
        }

        $pages = get_object_vars($paginator->getPages());
        
//        pr(array($params, $pages),1);

        $sizeClass = $size && isset($this->_sizes[$size])
                   ? $this->_sizes[$size] : '';
        
        $html = '';
                
        if ($pages['pageCount']) {
            $html .= '<ul class="pagination' . $sizeClass . '">' . PHP_EOL;
            if (isset($pages['previous'])) {
                $html .= '<li><a href="' . $this->view->url(array($pageParam => $pages['first'])) . '">'
                       . '&laquo;</a></li>';
            } else {
                $html .= '<li class="disabled"><span>&laquo;</span></li>';
            }

            if (isset($pages['previous'])) {
                $html .= '<li><a href="' . $this->view->url(array($pageParam => $pages['previous'])) . '">'
                       . '&lsaquo;</a></li>';
            } else {
                $html .= '<li class="disabled"><span>&lsaquo;</span></li>';
            }

            foreach ($pages['pagesInRange'] as $page) {
                if ($pages['current'] == $page) {
                    $html .= '<li class="active">';
                } else {
                    $html .= '<li>';
                }
                
                $html .= '<a href="' . $this->view->url(array($pageParam => $page)) . '">' 
                       . $page . '</a></li>';
            }
            
            if (isset($pages['next'])) {
                $html .= '<li><a href="' . $this->view->url(array($pageParam => $pages['next'])) . '">'
                      . '&rsaquo;</a></li>';
            } else {
                $html .= '<li class="disabled"><span>&rsaquo;</span></li>';
            }

            if (isset($pages['next'])) {
                $html .= '<li><a href="' . $this->view->url(array($pageParam => $pages['last'])) . '">'
                       . '&raquo;</a></li>';
            } else {
                $html .= '<li class="disabled"><span>&raquo;</span></li>';
            }
            $html .= PHP_EOL . '</ul>';
        }
                
        return $html;
    }
}
