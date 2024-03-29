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
    $this->query = $request->getParameter('query');
    if ($this->model === 'person') {
      if ($this->query) {
        $this->objects = PersonQuery::create()->filterByFname('%'.$this->query.'%')->_or()->filterByLname('%'.$this->query.'%')->orderByLname()->find();
      } else {
        $this->objects = PersonQuery::create()->orderByLname()->find();
      }
    } else if ($this->model === 'show') {
      $this->objects = ShowQuery::create()->orderByName()->find();
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->model = $request->getParameter('model');
    $this->data = json_decode($request->getContent());
    if ($this->model === 'person') {
      $person = new Person();
      $person->setFname($this->data->fname);
      $person->setLname($this->data->lname);
      $person->save();
      $this->id = $person->getId();
    } else if ($this->model === 'show') {
      $show = new Show();
      $show->setName($this->data->name);
      $show->setCreators($this->data->creators);
      $show->setCast($this->data->cast);
      $show->setGenre(GenrePeer::retrieveByPk($this->data->genre_id));
      $show->setStoryline($this->data->storyline);
      $show->save();
      $this->id = $show->getId();
    }
  }

  public function executeGet(sfWebRequest $request)
  {
    return $this;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->model = $request->getParameter('model');
    $this->data = json_decode($request->getContent());
    if ($this->model === 'person') {
      $person = PersonQuery::create()->findPk($request->getParameter('id'));
      $this->forward404Unless($person, sprintf('Object Person does not exist (%s).', $request->getParameter('id')));
      $person->setFname($this->data->fname);
      $person->setLname($this->data->lname);
      $person->save();
    } else if ($this->model === 'show') {
      $show = ShowQuery::create()->findPk($request->getParameter('id'));
      $this->forward404Unless($show, sprintf('Object Show does not exist (%s).', $request->getParameter('id')));
      $show->setName($this->data->name);
      $show->setCreators($this->data->creators);
      $show->setCast($this->data->cast);
      $show->setGenre(GenrePeer::retrieveByPk($this->data->genre_id));
      $show->setStoryline($this->data->storyline);
      $show->save();
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->model = $request->getParameter('model');
    if ($this->model === 'person') {
      $person = PersonQuery::create()->findPk($request->getParameter('id'));
      $this->forward404Unless($person, sprintf('Object Person does not exist (%s).', $request->getParameter('id')));
      $person->delete();
      $this->redirect('person/index');
    } else if ($this->model === 'show') {
      $show = ShowQuery::create()->findPk($request->getParameter('id'));
      $this->forward404Unless($show, sprintf('Object Show does not exist (%s).', $request->getParameter('id')));
      $show->delete();
    }
  }

}
