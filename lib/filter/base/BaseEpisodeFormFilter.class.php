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
      'name'   => new sfWidgetFormFilterInput(),
      'number' => new sfWidgetFormFilterInput(),
      'season' => new sfWidgetFormFilterInput(),
      'year'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'   => new sfValidatorPass(array('required' => false)),
      'number' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'season' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'id'     => 'Number',
      'name'   => 'Text',
      'number' => 'Number',
      'season' => 'Number',
      'year'   => 'Number',
    );
  }
}
