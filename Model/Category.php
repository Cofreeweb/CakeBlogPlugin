<?php
App::uses('BlogAppModel', 'Blog.Model');
/**
 * Category Model
 *
 */
class Category extends BlogAppModel {

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array(
		'Tree',
	);
  
  

}
