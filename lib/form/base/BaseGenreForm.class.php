<?php

/**
 * Genre form base class.
 *
 * @method Genre getObject() Returns the current form's model object
 *
 * @package    TV-web-app
 * @subpackage form
 * @author     Frederic Ye
 */
abstract class BaseGenreForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Genre', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('genre[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Genre';
  }


}
