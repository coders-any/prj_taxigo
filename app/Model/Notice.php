<?php
App::uses('AppModel', 'Model');
class Notice extends AppModel
{
    public $name = "Notice";
    public $hasMany = array(
        'CatNoticeNotice' => array(
            'className' => 'CatNoticeNotice',
            'foreignKey' => 'notice_id',
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