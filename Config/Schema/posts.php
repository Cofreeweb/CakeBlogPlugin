<?php 

class PostsSchema extends CakeSchema {

/**
 * Name
 *
 * @var string
 */
	public $name = 'Posts';

/**
 * Before callback
 *
 * @param string Event
 * @return boolean
 */
	public function before($event = array()) {
		return true;
	}

/**
 * After callback
 *
 * @param string Event
 * @return boolean
 */
	public function after($event = array()) {
		return true;
	}

/**
 * Schema for taggeds table
 *
 * @var array
 */
	public $categories = array(
	  'id' => array( 'type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
    'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index'),
    'title' => array( 'type' => 'string', 'null' => true),
    'parent_id' => array( 'type' => 'integer', 'null' => false, 'default' => 0, 'key' => 'index'),
    'level' => array( 'type' => 'integer', 'length' => 3, 'null' => false),
    'lft' => array( 'type' => 'integer', 'length' => 9, 'null' => false, 'key' => 'index'),
    'rght' => array( 'type' => 'integer', 'length' => 9, 'null' => false, 'key' => 'index'),
    'created' => array( 'type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
    'indexes' => array(
 		    'PRIMARY' => array( 'column' => 'id', 'unique' => 1), 
 		    'slug' => array( 'column' => 'slug',  'unique' => 0),
 		    'parent_id' => array( 'column' => 'parent_id', 'unique' => 0),
 		    'lft' => array( 'column' => 'lft', 'unique' => 0),
 		    'rght' => array( 'column' => 'rght', 'unique' => 0),
 		 )
	);
	
	

}
