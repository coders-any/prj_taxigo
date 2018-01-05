<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
    public $uses = array('User');
    public $components = array('DebugKit.Toolbar','Session');

}
