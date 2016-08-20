<?php
class Client extends \atk4\data\Model {

    public $table = 'client';

    function init()
    {
        parent::init();

        $this->addFields(['name','address']);
        $this->hasMany('Project', new Project());
    }
}
