<?php

/**
 * genre actions.
 *
 * @package    TV-web-app
 * @subpackage genre
 * @author     Frederic Ye
 */
class genreActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Genres = GenreQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Genre = GenrePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Genre);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GenreForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GenreForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Genre = GenreQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Genre, sprintf('Object Genre does not exist (%s).', $request->getParameter('id')));
    $this->form = new GenreForm($Genre);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Genre = GenreQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Genre, sprintf('Object Genre does not exist (%s).', $request->getParameter('id')));
    $this->form = new GenreForm($Genre);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Genre = GenreQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Genre, sprintf('Object Genre does not exist (%s).', $request->getParameter('id')));
    $Genre->delete();

    $this->redirect('genre/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Genre = $form->save();

      $this->redirect('genre/edit?id='.$Genre->getId());
    }
  }
}
