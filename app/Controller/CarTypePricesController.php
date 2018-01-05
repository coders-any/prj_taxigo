<?php
App::uses('AppController', 'Controller');
class CarTypePricesController extends AppController
{
    public $uses = array('CarTypePrice');
    var $components = array('Common');
    var $layout = 'admin';
    public function list_car_type_price($id = null){
        $this->set('title_for_layout', 'Cài đặt giá theo Km');
        if($this->Common->checkLoginAdmin()){
            //list data
            $listData = $this->CarTypePrice->find('all');
            $listCar = $this->Common->listTypeCar();
            $this->set('listCar',$listCar);
            $this->set('listData',$listData);
            if(!empty($id)){
                $data  = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.id'=>$id)));
                $this->set('data',$data);
            }
            if ($this->request->is('post')) {

                $id_car_type_price = $this->request->data['id'];
                if(empty($id_car_type_price)){
                    //add
                    if($this->CarTypePrice->save($this->request->data)){
                        $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'cartypeprices','action' => 'list_car_type_price'));
                    }else{
                        $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'cartypeprices','action' => 'list_car_type_price'));
                    }
                }else{
                    //edit
                    if($this->CarTypePrice->save($this->request->data)){
                        $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'cartypeprices','action' => 'list_car_type_price'));
                    }else{
                        $this->Session->setFlash(__('Sửa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'cartypeprices','action' => 'list_car_type_price'));
                    }

                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_road_price($id = null){
        if($this->Common->checkLoginAdmin()){
            if(isset($id)){
                if($this->CarTypePrice->delete(array('CarTypePrice.id' => $id), true)){
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'cartypeprices','action' => 'list_car_type_price'));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'cartypeprices','action' => 'list_car_type_price'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
}