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

  public function executeCreate(sfWebRequest $request)
  {
    $this->model = $request->getParameter('model');
    $this->person = json_decode($request->getContent());
    $person = new Person();
    $person->setFname($this->person->fname);
    $person->setLname($this->person->lname);
    $person->save();
    return $this;
  }

}
