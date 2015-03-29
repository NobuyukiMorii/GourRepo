<?php
class Tag extends AppModel {

	public $name = 'Tag';

    public $hasMany = array(
        'TagRelation' => array(
            'className'     => 'TagRelation',
            'foreignKey'    => 'tag_id',
        )
    );

    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'notEmpty',
                'last'    => '料理名は必ず入力して下さい。'
            ),
            'between' => array(
                'rule'    => array('between', 1, 50),
                'message' => '料理名は50文字以内で入力して下さい。'
            )
        ),
    );

}
