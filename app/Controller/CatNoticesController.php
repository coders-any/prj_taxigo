<?php
App::uses('AppController', 'Controller');
class CatNoticesController extends AppController
{
    public $uses = array('LongWay', 'CarTypePrice', 'RoadPrice','CatNotice');
    var $components = array('Common');
    var $layout = 'admin';
    public function list_cat_notice($id = null){
        if($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Chuyên mục tin tức');
            $listData = $this->CatNotice->find('all');
            $this->set('listData', $listData);
            if(!empty($id)){
                $data  = $this->CatNotice->find('first',array('conditions'=>array('CatNotice.id'=>$id)));
                $this->set('data',$data);
            }
            if ($this->request->is('post')) {
                $this->request->data['slug'] = $this->Common->createSlug($this->request->data['name']);
                $id_cat_notice = $this->request->data['id'];
                if(empty($id_cat_notice)){
                    //add
                    if($this->CatNotice->save($this->request->data)){
                        $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'catnotices','action' => 'list_cat_notice'));
                    }else{
                        $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'catnotices','action' => 'list_cat_notice'));
                    }
                }else{
                    //edit
                    if($this->CatNotice->save($this->request->data)){
                        $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'catnotices','action' => 'list_cat_notice'));
                    }else{
                        $this->Session->setFlash(__('Sửa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'catnotices','action' => 'list_cat_notice'));
                    }

                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_cat_notice($id = null){
        if ($this->Common->checkLoginAdmin()) {
            if(isset($id)){
                if($this->CatNotice->delete(array('CatNotice.id' => $id), true)){
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'catnotices','action' => 'list_cat_notice'));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'catnotices','action' => 'list_cat_notice'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
}