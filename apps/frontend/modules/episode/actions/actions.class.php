<?php

/**
 * episode actions.
 *
 * @package    TV-web-app
 * @subpackage episode
 * @author     Frederic Ye
 */
class episodeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Episodes = EpisodeQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Episode = EpisodePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Episode);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EpisodeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EpisodeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Episode = EpisodeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Episode, sprintf('Object Episode does not exist (%s).', $request->getParameter('id')));
    $this->form = new EpisodeForm($Episode);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Episode = EpisodeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Episode, sprintf('Object Episode does not exist (%s).', $request->getParameter('id')));
    $this->form = new EpisodeForm($Episode);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Episode = EpisodeQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Episode, sprintf('Object Episode does not exist (%s).', $request->getParameter('id')));
    $Episode->delete();

    $this->redirect('episode/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Episode = $form->save();

      $this->redirect('episode/edit?id='.$Episode->getId());
    }
  }
}
