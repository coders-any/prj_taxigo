<?php
App::uses('AppController', 'Controller');
class RoadPricesController extends AppController
{
    public $uses = array('RoadPrice');
    var $components = array('Common');
    var $layout = 'admin';
    public function add_road_price(){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Thêm phí cầu đường');
            $listCity = $this->Common->listCity();
            $this->set('listCity',$listCity);
            if ($this->request->is('post')) {
                if($this->RoadPrice->save($this->request->data)){
                    $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'roadprices','action' => 'list_road_price'));
                }else{
                    $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'roadprices','action' => 'list_road_price'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }

    public function edit_road_price($id = null){
        if ($this->Common->checkLoginAdmin()) {
            $data  = $this->RoadPrice->find('first',array('conditions'=>array('RoadPrice.id'=>$id)));
            $listCity = $this->Common->listCity();
            $this->set('listCity',$listCity);
            $this->set('data',$data);

            if ($this->request->is('post')) {
                if($this->RoadPrice->save($this->request->data)){
                    $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'roadprices','action' => 'list_road_price'));
                }else{
                    $this->Session->setFlash(__('Sửa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'roadprices','action' => 'list_road_price'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_road_price($id =null){
        if($this->Common->checkLoginAdmin()){
            if(isset($id)){
                if($this->RoadPrice->delete(array('RoadPrice.id' => $id), true)){
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'roadprices','action' => 'list_road_price'));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'roadprices','action' => 'list_road_price'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function list_road_price(){

        if($this->Common->checkLoginAdmin()){
            $listCity = $this->Common->listCity();
            $this->set('listCity', $listCity);
            $this->layout = 'admin';
            $this->set('title_for_layout', 'Danh sách phí cầu đường');
            $data  = $this->RoadPrice->find('all');
            $this->set('data',$data);
        }else{
            return $this->redirect('/admin');
        }

    }

}