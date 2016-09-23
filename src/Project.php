<?php
class Project extends \atk4\data\Model {

    public $table = 'project';

    function init()
    {
        parent::init();

        $this->addField('name');
        $this->addField('development',  ['type'=>'money']);
        $this->addField('marketing',    ['type'=>'money']);

        $this->addExpression('budget',  '[development]+[marketing]*1.5');

        $this->addField('is_cancelled', ['type'=>'boolean']);

        $this->hasOne('client_id', new Client());

    }
}
