<?php

/**
 * Show filter form base class.
 *
 * @package    TV-web-app
 * @subpackage filter
 * @author     Frederic Ye
 */
abstract class BaseShowFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'creators'   => new sfWidgetFormFilterInput(),
      'cast'       => new sfWidgetFormFilterInput(),
      'genre_id'   => new sfWidgetFormPropelChoice(array('model' => 'Genre', 'add_empty' => true)),
      'image'      => new sfWidgetFormFilterInput(),
      'storyline'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'creators'   => new sfValidatorPass(array('required' => false)),
      'cast'       => new sfValidatorPass(array('required' => false)),
      'genre_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Genre', 'column' => 'id')),
      'image'      => new sfValidatorPass(array('required' => false)),
      'storyline'  => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('show_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Show';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'creators'   => 'Text',
      'cast'       => 'Text',
      'genre_id'   => 'ForeignKey',
      'image'      => 'Text',
      'storyline'  => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
