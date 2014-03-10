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
	public $posts = array(
		'id' => array('type' =>'integer', 'null' => false, 'key' => 'primary'),
		'antetitle' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'title' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'subtitle' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => null, 'key' => 'index'),
		'slug' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'body' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'comment_count' => array('type' =>'integer', 'null' => true, 'default' => 0),
		'published_at' => array('type' =>' datetime', 'null' => true, 'default' => NULL),
		'created' => array('type' =>' datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'active' => array('column' => 'active', 'unique' => 0),
		)
	);
	
	

}
