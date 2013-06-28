<?php

/**
 * Show form base class.
 *
 * @method Show getObject() Returns the current form's model object
 *
 * @package    TV-web-app
 * @subpackage form
 * @author     Frederic Ye
 */
abstract class BaseShowForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'creators'   => new sfWidgetFormInputText(),
      'cast'       => new sfWidgetFormInputText(),
      'genre_id'   => new sfWidgetFormPropelChoice(array('model' => 'Genre', 'add_empty' => false)),
      'image'      => new sfWidgetFormInputText(),
      'storyline'  => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'creators'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cast'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'genre_id'   => new sfValidatorPropelChoice(array('model' => 'Genre', 'column' => 'id')),
      'image'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'storyline'  => new sfValidatorString(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('show[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Show';
  }


}
