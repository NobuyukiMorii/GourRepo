<?php

class Restaurant extends AppModel{
	public function getAll(){
		return $this->find('all');
	}
}

