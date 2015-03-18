<?php

class RestaurantsController extends AppController{
	//ヘルパーを使用	
	public $helpers = array('Html', 'Form');
	
	}

	
	public function index(){
		$this->set('restaurants', $this->Restaurant->find('all'));
	}


