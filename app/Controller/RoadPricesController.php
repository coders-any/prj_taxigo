<?php
App::uses('AppController', 'Controller');
class RoadPricesController extends AppController
{
    public $uses = array('RoadPrice');
    var $components = array('Common');
    var $layout = 'admin';
    public function add_road_price(){
        $listCity = $this->Common->listCity();
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Thêm taxi đường dài');
            if ($this->request->is('post')) {

            }
        }
        $this->set('listCity',$listCity);
    }

}