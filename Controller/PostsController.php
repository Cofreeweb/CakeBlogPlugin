<?php

class PostsController extends AppController 
{
  public $name = 'Posts';
  
  
  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow();
  }
  
  public function index()
  {
    
  }
  
  public function view()
  {
    _d( $this->request);
  }
  
  public function edit()
  {
    if( $this->request->is( 'post', 'put'))
    {
      $this->Post->create();
      
      if( $this->Post->save( $this->request->ember))
      {
        $this->set( 'success', true);
        $this->set( '_serialize', array( 'success'));
      }
    }
  }
  
  public function rest_index()
  {
    $datas = $this->Post->find( 'all', array(
        'fields' => array(
            'Post.id',
            'Post.title',
            'Post.body'
        )
    ));
    
    foreach( $datas as $data)
    {
      $data ['Post']['id'] = (int)$data ['Post']['id'];
      $posts [] = $data ['Post'];
    }
    
    $this->set( array( 'posts' => $posts, '_serialize' => array( 'posts')));
  }
}
?>