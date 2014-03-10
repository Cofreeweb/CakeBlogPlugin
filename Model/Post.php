<?php
/**
 * Post Model
 * 
 * [Short Description]
 *
 * @package default
 * @version $Id$
 * @copyright __MyCompanyName__
 **/
class Post extends AppModel 
{
  public $name = 'Post';
  
  public $actsAs = array(
      'Upload.Uploadable',
      'Cofree.Sluggable' => array(
      		'fields' => array(
      		    'title',
      		),
          'slugfield' => 'slug',
          'separator' => '-',
          'length' => 100,
      ),
  );
  
  public $admin = array(
      'nameSingular' => 'Entrada',
      'namePlural' => 'Entradas',
      'batchProcess' => false,
      'actionButtons' => true,
      'fieldsIndex' => array(
          'title',
      ),
      'fieldsSearch' => array(
          'title',
      )
  );
  
  public $fields = array(

      'title' => array(
          'title' => 'Título'
      ),
      'body' => array(
          'title' => 'Texto'
      ),
     
  );
}
?>