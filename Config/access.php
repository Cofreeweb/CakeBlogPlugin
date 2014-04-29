<?php

$config ['Access'] = array(
    'articles' => array(
      'name' => __d( 'admin', 'Noticias'),
      'urls' => array(
          array(
              'admin' => true,
              'plugin' => 'blog',
              'controller' => 'posts',
              'action' => 'add'
          ),
          array(
              'plugin' => 'blog',
              'controller' => 'posts',
              'action' => 'field'
          ),
          array(
              'plugin' => 'blog',
              'controller' => 'posts',
              'action' => 'edit'
          )
      ),
      'front' => array(
          array(
              'plugin' => 'blog',
              'controller' => 'posts',
              'action' => 'index'
          ),
          array(
              'plugin' => 'blog',
              'controller' => 'posts',
              'action' => 'view'
          ),
          array(
              'plugin' => 'blog',
              'controller' => 'posts',
              'action' => 'edit'
          )
      ),
      'adminLinks' => array(
          'noEdit' => array(
              array(
                  'label' => __d( 'admin', 'Editar noticia'),
                  'url' => array(
                      'plugin' => 'blog',
                      'controller' => 'posts',
                      'action' => 'edit',
                      'edit' => true
                  )
              )
          ),
          'allMode' => array(
              array(
                  'label' => __d( 'admin', 'Añadir noticia'),
                  'url' => '#/posts/add'
              ),
              array(
                  'label' => __d( 'admin', 'Borradores'),
                  'url' => '#/posts/drafts'
              )
          ),
          'editMode' => array(
              array(
                  'label' => __d( 'admin', 'Editar datos'),
                  'url' => '#/posts/edit/:id'
              ),
              array(
                  'label' => __d( 'admin', 'Publicar cambios'),
                  'url' => array(
                      'plugin' => 'blog',
                      'controller' => 'posts',
                      'action' => 'published',
                      'published' => true,
                      'edit' => false
                  )
              ),
              array(
                  'label' => __d( 'admin', 'Descartar cambios'),
                  'url' => array(
                      'plugin' => 'blog',
                      'controller' => 'posts',
                      'action' => 'discard',
                      'discard' => true,
                      'edit' => false
                  )
              ),
          )
      )
    )
);
