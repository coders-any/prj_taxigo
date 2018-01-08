<?php
App::uses('AppModel', 'Model');
class CatNoticeNotice extends AppModel
{
    public $name = "CatNoticeNotice";
    public $belongsTo = array(
        'CatNotice' => array(
            'className' => 'CatNotice',
            'foreignKey' => 'cat_notice_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Notice' => array(
            'className' => 'Notice',
            'foreignKey' => 'notice_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}