<?php
class Client extends \atk4\data\Model {

    public $table = 'client';

    function init()
    {
        parent::init();

        $this->addFields(['name','address']);
        $this->hasOne('country_id',new Country())
            ->addField('country', 'name');

        $this->hasMany('Project', new Project());

        $this->hasMany('ActiveProject', function($m) {
            return $m->ref('Project')->addCondition('is_cancelled', 0);
        })
            ->addField('total_budget', ['field'=>'budget', 'aggregate'=>'sum'])

        ;
    }
}
