<?php
App::uses('AppController', 'Controller');
class NoticesController extends AppController
{
    public $uses = array('LongWay', 'CarTypePrice', 'RoadPrice','CatNotice','Notice','CatNoticeNotice');
    var $components = array('Common');
    var $layout = 'admin';

    public function add_notice(){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Thêm bài viết');
            $cat_notice_data = $this->CatNotice->find('all');
            $this->set('cat_notice_data',$cat_notice_data);

            if ($this->request->is('post')) {
                $cat_arr = $this->request->data['cat_notice_id'];
                    $this->request->data['slug'] = $this->Common->createSlug($this->request->data['title']);
                    $this->Notice->clear();
                    if($this->Notice->save($this->request->data)){
                        $id_notice = $this->Notice->id;
                        if(!empty($cat_arr)){
                            foreach ($cat_arr as $value){
                                $this->CatNoticeNotice->clear();
                                $this->CatNoticeNotice->save(
                                    array(
                                        'cat_notice_id' => $value,
                                        'notice_id' => $id_notice,
                                    )
                                );
                            }
                        }
                        $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'notices','action' => 'list_notice'));
                    }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function edit_notice($id = null){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Sửa bài viết');
            $data = $this->Notice->find('first',array('conditions'=>array('Notice.id'=>$id)));
            $cat_notice_data = $this->CatNotice->find('all');
            $this->set('cat_notice_data',$cat_notice_data);
            $this->set('data', $data);


        }else{
            return $this->redirect('/admin');
        }
    }
    public function list_notice(){
        if ($this->Common->checkLoginAdmin()) {
        $this->set('title_for_layout', 'Danh sách bài viết');
        $data = $this->Notice->find('all');
        $cat_notice_data = $this->CatNotice->find('all');
        $this->set('cat_notice_data',$cat_notice_data);
        $this->set('data', $data);
        }else{
            return $this->redirect('/admin');
        }
    }
}