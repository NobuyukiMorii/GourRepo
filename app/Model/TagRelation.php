<?php
class TagRelation extends AppModel {

	public $name = 'TagRelation';

    public $belongsTo = array(
        'Movie' => array(
            'className' => 'Movie',
            'foreignKey' => 'movie_id'
        ),
        'Tag' => array(
            'className' => 'Tag',
            'foreignKey' => 'tag_id'
        )
    );

}
