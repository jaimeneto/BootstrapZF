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
 * Helper to generate a carousel with the Bootstrap UI.
 *
 * @category ViewHelpers
 * @package Bootstrap_View
 * @subpackage Helper
 * @author Jaime Neto <contato@jaimeneto.com>
 */
class Bootstrap_View_Helper_Carousel extends Zend_View_Helper_Abstract
{

    public function carousel($id, array $images, array $options = null)
    {
        $showIndicators = !isset($options['showIndicators']) 
                    || $options['showIndicators'];
        
        $showControls = !isset($options['showControls']) 
                    || $options['showControls'];
        
        $showCaption = !isset($options['showCaption']) 
                    || $options['showCaption'];
        
        $html = '<div id="' . $id . '" class="carousel slide"' 
              . ' data-ride="carousel">' . PHP_EOL;

        $active = 0; $i = 0;
        foreach($images as $image) {
            if (is_array($image) && isset($image['active']) 
                    && $image['active']) {
                $active = $i;
            }
        }
        
        if ($showIndicators) {
            $html .= '<ol class="carousel-indicators">' . PHP_EOL;
            $i = 0;
            foreach($images as $image) {
                $html .= '<li data-target="#' . $id . '" ' 
                       . 'data-slide-to="' . $i . '"' 
                       . ($i == $active ? ' class="active"' : '') . '></li>' 
                       . PHP_EOL;
                $i++;
            }
            $html .= '</ol>' . PHP_EOL;
        }

        $html .= '<div class="carousel-inner">'. PHP_EOL;
        
        $i = 0;
        foreach($images as $image) {
            $html .= '<div class="item' 
                   . ($i == $active ? ' active' : '') . '">' 
                   . PHP_EOL;
            
            if (is_array($image)) {
                $html .= '<img src="' . $image['src'] . '"';
                if (isset($image['alt']) && $image['alt']) {
                    $html .= ' alt="' . $image['alt'] . '"';
                }
                if (isset($image['title']) && $image['title']) {
                    $html .= ' title="' . $image['title'] . '"';
                }
                $html .= '>' . PHP_EOL;

                if ($showCaption && ((isset($image['caption-title']) 
                        && $image['caption-title']) || (isset($image['caption']) 
                            && $image['caption']))) {
                    $html .= '<div class="carousel-caption">'. PHP_EOL;
                    if (isset($image['caption-title']) 
                            && $image['caption-title']) {
                        $html .= '<h3>' . $image['caption-title'] . '</h3>'
                               . PHP_EOL;
                    } 
                    if (isset($image['caption']) && $image['caption']) {
                        $html .= '<p>' . $image['caption'] . '</p>'
                               . PHP_EOL;
                    }
                    $html .= '</div>' . PHP_EOL;
                }
            } else {
                $html .= '<img src="' . $image . '">';
            }
            
            $html .= '</div>' . PHP_EOL;
            $i++;
        }
        $html .= '</div>' . PHP_EOL;

        if ($showControls) {
            $html .= '<a class="left carousel-control" role="button" ' 
                   . 'href="#' . $id . '" data-slide="prev">'
                   . '<span class="glyphicon glyphicon-chevron-left"></span>' 
                   . '</a>' . PHP_EOL
                   . '<a class="right carousel-control" role="button" ' 
                   . 'href="#' . $id . '" data-slide="next">'
                   . '<span class="glyphicon glyphicon-chevron-right"></span>' 
                   . '</a>' . PHP_EOL;
        }
      
        $html .= '</div>';
     
        return $html;
    }

}
