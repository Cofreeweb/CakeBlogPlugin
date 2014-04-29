<?php

App::uses( 'BlogAppController', 'Blog.Controller');


class PostsController extends BlogAppController 
{
  public $name = 'Posts';
  
  public $uses = array( 'Blog.Post', 'Upload.Upload');
  
/**
 * Angular.Seter setea las variables para ser usadas en $rootScope
 */
  public $helpers = array( 'Blog.Blog', 'Angular.Seter' => array(
      'vars' => array( 'post'),
      'module' => 'adminApp'
  ));
  
  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow();
  }
  
  public function index()
  {
    $posts = $this->Post->find( 'all', array(
        'conditions' => array(
            'Post.section_id' => $this->request->params ['section_id']
        )
    ));
    
    $this->set( compact( 'posts'));
  }
  
  public function view()
  {
    $revision = isset( $this->request->params ['edit']) ? 'draft' : 'published';
    $post = $this->Post->find( 'first', array(
        'conditions' => array(
            'Post.slug' => $this->request->params ['slug']
        ),
        'revision' => $revision
    ));
    
    if( !$post)
    {
      throw new NotFoundException( 'Entrada no encontrada');
    }
    
    $this->set( compact( 'post'));
  }
  
  public function edit()
  {
    $this->view();
    $this->render( 'view');
  }
  
  public function published()
  {
    $post = $this->Post->find( 'first', array(
        'conditions' => array(
            'Post.slug' => $this->request->params ['slug']
        ),
        'revision' => 'draft'
    ));

    $this->Post->published( $post ['Post']['id']);
    $this->redirect( array(
        'action' => 'view',
        'section_id' => $this->request->params ['section_id'],
        'slug' => $post ['Post']['slug']
    ));
  }
  
  public function discard()
  {
    $entry = $this->Entry->getEntry( $this->request->params ['section_id'], 'draft');
    $this->Entry->discard( $entry ['Entry']['id']);
    $this->redirect( array(
        'action' => 'view',
        'section_id' => $this->request->params ['section_id']
    ));
  }
  
  public function admin_add()
  {
    if( $this->request->is( 'post', 'put'))
    {
      if( $this->Post->createPost( $this->request->data ['section_id']))
      {
        // Creamos la URL para la redirección
        $post = $this->Post->find( 'first', array(
            'conditions' => array(
                'Post.id' => $this->Post->id
            ),
            'revision' => 'draft'
        ));

        $url = Router::url( array(
            'admin' => false,
            'plugin' => 'blog',
            'controller' => 'posts',
            'action' => 'edit',
            'slug' => $post ['Post']['slug'],
            'section_id' => $post ['Post']['section_id'],
            'edit' => true
        ));
        
        $this->set( 'success', true);
        $this->set( array(
            'success' => true,
            'redirect' => $url,
            '_serialize' => array(
                'success',
                'redirect'
            )
        ));
      }
    }
  }
  
  public function admin_drafts()
  {
    $posts = $this->Post->find( 'all', array(
        'conditions' => array(
            'Post.section_id' => $this->request->data ['section_id']
        ),
        'revision' => 'draft',
        'onlyDraft' => true
    ));
    
    $this->set( array(
        'posts' => $posts,
        '_serialize' => array(
            'posts',
        )
    ));
  }
  
  public function admin_edit( $id)
  {
    if( $this->request->is( 'post'))
    {
      if( $this->Post->save( $this->request->data, array(
        'revision' => 'draft'
      )))
      {
        $success = true;
      }
      else
      {
        $success = false;
      }
      
      $this->set( array(
          'success' => $success,
          '_serialize' => array(
              'success',
          )
      ));
    }
  }
  
  public function field()
  {
    $data = $this->request->data;
    
    if( !isset( $data ['id']) || !isset( $data ['field']) || !isset( $data ['value']))
    {
      $success = false;
    }
    else
    {
      $this->Post->id = $data ['id'];
      $this->Post->revision = 'draft';
      $this->Post->save( array(
          $data ['field'] => $data ['value']
      ));

      $success = true;
    }
    
    $this->set( array(
        'success' => $success,
        '_serialize' => array(
            'success'
        )
    ));
  }
  
  
  public function upload()
  {
    // La configuración del upload
    $config = Configure::read( 'Upload.'. $this->request->query ['key']);
    $config ['config']['fields'] = array(
		    'dir' => 'path',
		    'type' => 'mimetype'
		);
		
    // Lee el Behavior Upload.Upload para el model asociado, pasándole los datos indicados en la configuración anteriormente leída
    $this->Upload->Behaviors->load( 'Upload.Upload', array( 
        'filename' => $config ['config'],
    ));
    
    // Los datos a guardar
    $data = $this->request->params ['form'];
    $data ['content_type'] = $this->request->query ['key'];
    $data ['model'] = $this->request->query ['model'];
    
    if( isset( $this->request->query ['content_id']))
    {
      $data ['content_id'] = $this->request->query ['content_id'];
    }

    if( $this->Upload->save( $data))
    {
      $last = $this->Upload->read( null);
     
      $upload_id = $this->Post->addSubdocument( $last ['Upload'], array(
          'id' => $this->request->query ['content_id'],
          'path' => 'photos'
      ));
      
      $last ['Upload']['id'] = $upload_id;
      
      $this->set( 'success', true);
      
      App::uses('JsonView', 'View');
      $View = new JsonView($this);
      
      if( isset( $config ['thumbnailSizes']))
      {
        $last ['Upload']['thumbail'] = UploadUtil::thumbailPathMulti( $last);
      }
      
      $this->set( 'upload', $last ['Upload']);
      $this->set( '_serialize', array( 'success', 'upload'));
    }
    else
    {
      $errors = $this->Upload->invalidFields();
      
      if( isset( $errors ['filename']))
      {
        $this->set( 'error', current( $errors ['filename']));
      }
      else
      {
        $this->set( 'error', false);
      }

      $this->set( 'success', false);
      $this->set( '_serialize', array( 'success', 'error'));
    }
  }
  
  public function delete_upload()
  {
    $this->Post->deleteSubdocument( 'photos', $this->request->data ['id']);
    $this->set( array(
        'success' => true,
        '_serialize' => array(
            'success'
        )
    ));
  }
}
?>