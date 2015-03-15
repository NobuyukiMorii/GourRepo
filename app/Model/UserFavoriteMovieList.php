<?php
class UserFavoriteMovieList extends AppModel {

	public $name = 'UserFavoriteMovieList';

    public $belongsTo = array(
        'Movie' => array(
            'className' => 'Movie',
            'foreignKey' => 'movie_id',
            'conditions'=> array('Movie.del_flg' => 0)
        )
    );

}
