<?php

class RestaurantsController extends AppController{
	public $helpers = array('Html', 'Form');
	public function beforeFilter(){
		parent:beforeFilter();
	}
	
	public $components = array('Session');

	public function index(){
		$this->set('restaurants', $this->Restaurant->find('all'));
	}



// 	public function view($id){
// 		if (!$id) {
// 			throw new NotFoundException(__('Invalid post'));
// 		}
// 		$this->set('restaurant', $restaurant);
// 	}



// 	public function add(){
// 		if ($this->request->is('post')){
// 			$this->Restaurant->create();
// 			if ($this->Restaurant->save($this->request->data)){
// 				$this->Session->setFlash(__('Your post has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			}
// 			$this->Session->setFlash(__('Unable to add your post.'));
// 		}
// 	}



// 	public function edit($id = null) {
//     if (!$id) {
//         throw new NotFoundException(__('Invalid'));
//     }

//     $restaurants = $this->Restaurant->findById($id);
//     if (!$restaurants) {
//         throw new NotFoundException(__('Invalid'));
//     }

//     if ($this->request->is(array('post', 'put'))) {
//         $this->Restaurant->id = $id;
//         if ($this->Restaurant->save($this->request->data)) {
//             $this->Session->setFlash(__('Your post has been updated.'));
//             return $this->redirect(array('action' => 'index'));
//         }
//         $this->Session->setFlash(__('Unable to update yours.'));
//     }

//     if (!$this->request->data) {
//         $this->request->data = $restaurant;
//     }
// }




}