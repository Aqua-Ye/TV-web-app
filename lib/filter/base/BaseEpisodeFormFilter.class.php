<?php

/**
 * Episode filter form base class.
 *
 * @package    TV-web-app
 * @subpackage filter
 * @author     Frederic Ye
 */
abstract class BaseEpisodeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'show_id' => new sfWidgetFormPropelChoice(array('model' => 'Show', 'add_empty' => true)),
      'name'    => new sfWidgetFormFilterInput(),
      'number'  => new sfWidgetFormFilterInput(),
      'season'  => new sfWidgetFormFilterInput(),
      'year'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'show_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Show', 'column' => 'id')),
      'name'    => new sfValidatorPass(array('required' => false)),
      'number'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'season'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('episode_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Episode';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'show_id' => 'ForeignKey',
      'name'    => 'Text',
      'number'  => 'Number',
      'season'  => 'Number',
      'year'    => 'Number',
    );
  }
}
