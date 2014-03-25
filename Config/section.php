<?php

/**
 * La configuración de los tipos de secciones que habrá en este plugin
 *
 */
 
$config ['SectionSettings'] = array(
    'name' => 'Blog',
    'url' => array(
        'plugin' => 'blog',
        'controller' => 'posts',
        'action' => 'index'
    ),
    'settings' => array(
        array(
            'key' => 'posts_per_page',
            'label' => 'Entradas por página',
            'type' => 'range',
            'options' => array(
              'from' => 1,
              'to' => 10,
              'step' => 1,
              'dimension' => " entradas"
            ),
            'default' => 5
        ),
        array(
            'key' => 'comments',
            'label' => 'Permitir comentarios',
            'type' => 'boolean',
            'default' => 1
        ),
    )
);