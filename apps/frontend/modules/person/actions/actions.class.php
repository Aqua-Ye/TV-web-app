<?php

/**
 * person actions.
 *
 * @package    TV-web-app
 * @subpackage person
 * @author     Frederic Ye
 */
class personActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Persons = PersonQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Person = PersonPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Person);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PersonForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PersonForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Person = PersonQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Person, sprintf('Object Person does not exist (%s).', $request->getParameter('id')));
    $this->form = new PersonForm($Person);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Person = PersonQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Person, sprintf('Object Person does not exist (%s).', $request->getParameter('id')));
    $this->form = new PersonForm($Person);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Person = PersonQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Person, sprintf('Object Person does not exist (%s).', $request->getParameter('id')));
    $Person->delete();

    $this->redirect('person/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Person = $form->save();

      $this->redirect('person/edit?id='.$Person->getId());
    }
  }
}
