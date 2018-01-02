<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
    public $name = "User";
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }

        if (isset($this->data[$this->alias]['show_page'])) {
            $this->data[$this->alias]['show_page'] = serialize($this->data[$this->alias]['show_page']);
        }

        return true;
    }
}