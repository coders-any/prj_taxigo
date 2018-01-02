<?php
App::uses('AppController', 'Controller');
/**
 * Accounts Controller
 *
 * @property Account $Account
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DashboardController extends AppController
{
    public $uses = array('User');

    public function beforeFilter()
    {
        parent::beforeFilter();
    }
    public function index(){
        $this->layout = 'admin';
        $this->set('title_for_layout', 'Hệ thống quản trị TaxiGo');

    }
}


?>