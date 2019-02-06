<?php

class CategoriesController extends AppController {
  public function index() {
      
       debug($this->Category->find('all'));
  }
}
