<?php
App::uses('CakeEventListener', 'Event');

class BlogEvents extends Object implements CakeEventListener
{
  public function implementedEvents()
  {
    return array(
      'Section.Controller.Sections.create.blog' => array(
        'callable' => 'afterCreateSection',
      ),
    );
  }

  public function afterCreateSection( $event)
  {
    $controller = $event->subject();
    _d( $controller->request->Section->id);
  }
}



?>