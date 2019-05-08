<?php
App::uses('AppController', 'Controller');
class ZipcodesController extends AppController {

    public $components = array('RequestHandler');

    public function fetch(){
        $zip =$this->Zipcode->find('all',array(
            'fields' => array('code','prefecture','city'),
            'recursive' => -1,
        ));
        foreach ($zip as $zips):
        if($this->RequestHandler->isAjax()){
            echo $zips['Zipcode']['code'];
            echo $zips['Zipcode']['prefecture'];
            echo $zips['Zipcode']['city'];
        };
        endforeach;

        /*if($this->request->is('Post')){
            debug($this->request->data);
            exit;
        }*/
        $this->autoRender = FALSE;

    }


};
