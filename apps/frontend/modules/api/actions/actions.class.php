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

  public function executeGet(sfWebRequest $request)
  {
    return $this;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    return $this;
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->model = $request->getParameter('model');
    $Person = PersonQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Person, sprintf('Object Person does not exist (%s).', $request->getParameter('id')));
    $Person->delete();
    $this->redirect('person/index');
    return $this;
  }

}
