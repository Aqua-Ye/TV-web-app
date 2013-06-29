<?php

/**
 * show actions.
 *
 * @package    TV-web-app
 * @subpackage show
 * @author     Frederic Ye
 */
class showActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Shows = ShowQuery::create()->find();
    $this->Genres = GenreQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Show = ShowPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Show);
  }

  public function executeLast(sfWebRequest $request)
  {
    $max = 10;
    $this->Shows = ShowQuery::create()->limit($max)->orderByUpdatedAt('desc')->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ShowForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ShowForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Show = ShowQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Show, sprintf('Object Show does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShowForm($Show);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Show = ShowQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Show, sprintf('Object Show does not exist (%s).', $request->getParameter('id')));
    $this->form = new ShowForm($Show);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Show = ShowQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Show, sprintf('Object Show does not exist (%s).', $request->getParameter('id')));
    $Show->delete();

    $this->redirect('show/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Show = $form->save();

      $this->redirect('show/edit?id='.$Show->getId());
    }
  }
}
