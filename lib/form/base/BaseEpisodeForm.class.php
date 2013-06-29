<?php

/**
 * Episode form base class.
 *
 * @method Episode getObject() Returns the current form's model object
 *
 * @package    TV-web-app
 * @subpackage form
 * @author     Frederic Ye
 */
abstract class BaseEpisodeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'show_id' => new sfWidgetFormPropelChoice(array('model' => 'Show', 'add_empty' => false)),
      'name'    => new sfWidgetFormInputText(),
      'number'  => new sfWidgetFormInputText(),
      'season'  => new sfWidgetFormInputText(),
      'year'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'show_id' => new sfValidatorPropelChoice(array('model' => 'Show', 'column' => 'id')),
      'name'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'number'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'season'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'year'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('episode[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Episode';
  }


}
