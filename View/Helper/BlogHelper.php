<?php
App::uses('AppHelper', 'View/Helper');

/**
 * EntryHelper
 * 
 * Ayudante de las entries
 *
 * @package entry.view.helper
 **/

class BlogHelper extends AppHelper 
{

  public $helpers = array( 'Html', 'Form', 'Acl.Auth', 'Management.Inline', 'Angular.Seter');
  
/**
 * Carga el javascript necesario para la edición de las entries
 *
 * @return void
 */
  public function beforeLayout()
  { 
    if( $this->Auth->hasAccessKey( 'articles') && !$this->request->is( 'ajax'))
    {      
      $this->Html->script( array(
          '/blog/js/angular/controllers.js',
          '/blog/js/angular/config.js',
          '/upload/js/all.fineuploader-3.9.1.min',
          '/entry/js/angular/directives/upload_gallery.js',
          '/management/js/ckeditor/ckeditor',
          '/management/js/angular/directives/ckeditor',
          '/entry/js/angular/components/ckeditor.js',
          '/upload/js/upload.js'
    	), array(
    	  'inline' => false,
    	  'block' => 'scriptBottom'
    	));
    }
  }
  
  
}