<?php

/**
 * Person filter form base class.
 *
 * @package    TV-web-app
 * @subpackage filter
 * @author     Frederic Ye
 */
abstract class BasePersonFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'fname' => new sfValidatorPass(array('required' => false)),
      'lname' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('person_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'fname' => 'Text',
      'lname' => 'Text',
    );
  }
}
