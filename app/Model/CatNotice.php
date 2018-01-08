<?php
App::uses('AppModel', 'Model');
class CatNotice extends AppModel
{
    public $name = "CatNotice";
    public $hasMany = array(
        'CatNoticeNotice' => array(
            'className' => 'CatNoticeNotice',
            'foreignKey' => 'cat_notice_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
    );
}