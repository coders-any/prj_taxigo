<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
    public $uses = array('User');
    var $components = array('Session', 'Cookie', 'Auth');
    public function add(){
        $this->layout = 'admin';
        $this->set('title_for_layout', 'Thêm tài khoản');
        if ($this->request->is('post')) {
            $this->User->create();
            if(trim($this->request->data['User']['email']) == ''){
                $this->Session->setFlash(__('Email không thể trống!'), 'flashmessage', array('type' => 'error'), 'error');
            }else{
                $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Lưu dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    return $this->redirect(array('action' => 'add'));
                } else {
                    $this->Session->setFlash(__('Lưu dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                }
            }
        }
    }
    public function login() {
        $this->layout = 'admin_login';
        if ($this->request->is('post')) {
            $year =  time() + 86400;
            if(!empty($_POST['data']['User']['remember'])) {
                setcookie('usr', $_POST['data']['User']['email'], $year);
                setcookie('pwd', $_POST['data']['User']['password'], $year);
                setcookie('remember', $_POST['data']['User']['remember'], $year);
            }else{
                unset($_COOKIE['usr']);
                unset($_COOKIE['pwd']);
                unset($_COOKIE['remember']);
                setcookie('usr', null, -1, '/');
                setcookie('pwd', null, -1, '/');
                setcookie('remember', null, -1, '/');
            }

            if ($this->Auth->login()) {
                $data  = $this->User->find('first',array('conditions' => array(
                    'User.email' => $this->request->data['User']['email'],
                    'User.password' => md5($this->request->data['User']['password']),
                )));
                if(!empty($data)){
                    CakeSession::write('Auth.User.user_id', $data['User']['id']);
                    return $this->redirect('/Dashboards/index');
                }else{
                    $this->Session->setFlash(__('Đăng nhập thất bại'), 'flashmessage', array('type' => 'error'), 'error');
                }

            }

        }
    }
}