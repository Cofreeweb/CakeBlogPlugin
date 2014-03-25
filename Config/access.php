<?php

$config ['Access'] = array(
    'articles' => array(
      'name' => __d( 'admin', 'Noticias'),
      'urls' => array(
           array(
                'admin' => true,
                'plugin' => 'blog',
                'controller' => 'articles',
                'action' => 'add'
            ),
            array(
                'admin' => true,
                'plugin' => 'blog',
                'controller' => 'articles',
                'action' => 'index'
            )
      )
    )
);
