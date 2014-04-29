<?php
App::uses('PostsController', 'Blog.Controller');

/**
 * PostsController Test Case
 *
 */
class PostsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
  public $fixtures = array(
   'plugin.blog.post',
   'plugin.blog.section',
  );

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() 
	{
	  $result = $this->testAction( '/noticias', array('return' => 'vars'));	  
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testPublished method
 *
 * @return void
 */
	public function testPublished() {
	}

/**
 * testDiscard method
 *
 * @return void
 */
	public function testDiscard() {
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
	}

/**
 * testAdminDrafts method
 *
 * @return void
 */
	public function testAdminDrafts() {
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
	}

/**
 * testField method
 *
 * @return void
 */
	public function testField() {
	}

/**
 * testUpload method
 *
 * @return void
 */
	public function testUpload() {
	}

/**
 * testDeleteUpload method
 *
 * @return void
 */
	public function testDeleteUpload() {
	}

}
