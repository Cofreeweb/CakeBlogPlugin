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
  public $useDbConfig = 'mongo';
  
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
      'Mongodb.Schemaless',
      'Mongodb.SqlCompatible',
      'Mongodb.Revision',
  );
  
  
  public $mongoSchema = array(
    'title' => array( 'type' => 'string'),
    'slug' => array( 'type' => 'string'),
    'body' => array( 'type' => 'text', 'default' => null),
    'section_id' => array( 'type' =>'integer'),
    'user_id' => array( 'type' =>'integer'),
    'photos' => array(
        'filename' => array( 'type' => 'string'),
        'path' => array( 'type' => 'string'),
        'extension' => array('type' => 'string', 'default' => NULL),
    		'mimetype' => array('type' => 'string', 'default' => NULL),
    		'duration' => array('type' => 'string', 'default' => NULL),
    		'title' => array('type' => 'string', 'default' => NULL),
    		'subtitle' => array('type' => 'string', 'default' => NULL),
    		'text' => array('type' => 'text', 'default' => NULL),
    ),
    'deleted' => array( 'type' =>'boolean', 'default' => 0),
    'removed' => array( 'type' =>'boolean', 'default' => 0),
    'published_at' => array( 'type' =>'datetime'),
    'created' => array( 'type' =>'datetime'),
    'modified' => array( 'type' =>'datetime'),
  );
  
  public $belongsTo = array(
      'Section' => array(
          'className' => 'Section.Section'
      )
  );
  
  public $hasMany = array( 
      'Photo' => array(
          'className' => 'Upload.Upload',
          'foreignKey' => 'content_id',
          'conditions' => array(
              'Photo.model' => 'Post',
              'Photo.content_type' => 'Post'
          )
      ),
  );
  
/**
 * Construye la URL de la noticia
 *
 * @param array $results 
 * @return array
 */
  public function afterFind( $results)
  {
    if( isset( $results [0][$this->alias]))
    {
      foreach( $results as $key => &$result)
      {
        if( isset( $result [$this->alias]['slug']))
        {
          $result [$this->alias]['url'] = Router::url( array(
              'admin' => false,
              'plugin' => 'blog',
              'controller' => 'posts',
              'action' => 'view',
              'slug' => $result [$this->alias]['slug'],
              'section_id' => $result [$this->alias]['section_id'],
          ));

          $result [$this->alias]['url_edit'] = Router::url( array(
              'admin' => false,
              'plugin' => 'blog',
              'controller' => 'posts',
              'action' => 'edit',
              'slug' => $result [$this->alias]['slug'],
              'section_id' => $result [$this->alias]['section_id'],
              'edit' => true
          ));
        }
      }
    }
    
    return $results;
  }
  
  
  public function createPost( $section_id)
  {
    $section = $this->Section->find( 'first', array(
        'conditions' => array(
            'Section.id' => $section_id
        )
    ));

    $data = array(
        'section_id' => $section_id,
        'title' => 'Viva yo',
        'body' => 'Vamos para allá'
    );

    $this->create();
    
    return $this->save( $data, array(
        'revision' => 'draft'
    ));
  }
}
?>