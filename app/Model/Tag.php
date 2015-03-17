<?php
class Tag extends AppModel {

	public $name = 'Tag';

    public $hasMany = array(
        'TagRelation' => array(
            'className'     => 'TagRelation',
            'foreignKey'    => 'tag_id',
        )
    );

}
