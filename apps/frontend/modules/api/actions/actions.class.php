<?php

/**
 * api actions.
 *
 * @package    TV-web-app
 * @subpackage api
 * @author     Frederic Ye
 */
class apiActions extends sfActions
{

  public function executeList(sfWebRequest $request)
  {
    $this->model = $request->getParameter('model');
    if ($this->model === 'person') {
      $this->objects = PersonQuery::create()->find();      
    } else if ($this->model === 'show') {
      $this->objects = ShowQuery::create()->find();      
    }
  }

}
