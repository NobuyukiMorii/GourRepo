<?php
class UserWatchMovieList extends AppModel {

	public $name = 'UserWatchMovieList';

    public $belongsTo = array(
        'Movie' => array(
            'className' => 'Movie',
            'foreignKey' => 'movie_id'
        )
    );

}
