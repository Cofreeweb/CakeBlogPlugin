<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Categories Controller
 *
 */
class CategoriesController extends BlogAppController 
{

  public function admin_index()
  {
    $sections = $this->Section->getSections();
    
    $this->set( array( 
      'sections' => $sections, 
      '_serialize' => array( 
        'sections'
      )
    ));
  }

  public function admin_add()
  {
    
  }
}
