<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('BlogHelper', 'Blog.View/Helper');

/**
 * BlogHelper Test Case
 *
 */
class BlogHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Blog = new BlogHelper($View);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Blog);

		parent::tearDown();
	}

/**
 * testSuma method
 *
 * @return void
 */
	public function testSuma() 
  {
	  $a = 2;
    $b = 4;
    
    $result = $this->Blog->suma( $a, $b);
    $this->assertEqual( $result, 6);
    
    $a = 'ola';
    $b = 3;
    $result = $this->Blog->suma( $a, $b);
    $this->assertEqual( $result, 'Error');
  }

}
