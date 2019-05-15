<?php
App::uses('AppController', 'Controller');
class ZipcodesController extends AppController {

    public $components = array('RequestHandler');

    public function fetch(){
        $this->autoRender = FALSE;
        if($this->request->is('ajax')) {
            $zipcode = $this->request->data['zipcode'];
            /*$fetch = $this->Postelcode->query("
                select id, pref, city, street FROM `postelcodes`
                where zipcode = {$zipcode};
            ");*/
            $zip =$this->Zipcode->find('all',array(
                //'conditions'=>array(
                   //'zipcode'=>$this->request->data['zipcode'],
            //  ),
                'fields' => array('code','prefecture','city'),
            ));

            $jsoncode = json_encode($zip, JSON_UNESCAPED_UNICODE);
            echo $jsoncode;
        };
    /*    if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}*/


        /*foreach ($zip as $zips):
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


    }


};
