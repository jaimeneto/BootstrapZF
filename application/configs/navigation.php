<?php

return array(
    array(
        'label' => 'Home',
        'id'    => 'homepage',
        'action' => 'index',
        'controller' => 'index',
        'pages' => array(
            array(
                'label' => 'Home',
                'id'    => 'home-link',
                'action' => 'index',
                'controller' => 'index',
                'icon'  => 'glyphicon glyphicon-home'
            ),
            array(
                'label' => 'Tutorial',
                'action' => 'tutorial',
                'controller' => 'index',
                'icon'  => 'glyphicon glyphicon-book'
            ),
            array(
                'label' => 'Zend',
                'uri' => 'http://www.zend-project.com/',
                'order' => 100
            ),
            array(
                'label' => 'Page 2',
                'controller' => 'page2',
                'pages' => array(
                    array(
                        'label' => 'Page 2.1',
                        'action' => 'page2_1',
                        'controller' => 'page2',
                        'class' => 'special-one',
                        'title' => 'This element has a special class',
                        'icon'  => 'glyphicon glyphicon-star'
                    ),
                    array(
                        'label' => 'Page 2.2',
                        'action' => 'page2_2',
                        'controller' => 'page2',
                        'class' => 'special-two',
                        'title' => 'This element has a special class too'
                    ),
                    array(
                        'label' => 'divider',
                        'action' => '#',
                    ),
                    array(
                        'label' => 'Page 2.3',
                        'action' => 'page2_3',
                        'controller' => 'page2',
                        'class' => 'special-two',
                        'title' => 'This element has a special class too'
                    )
                )
            ),
        )
    ),
);