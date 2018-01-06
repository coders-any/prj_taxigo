<?php
App::uses('AppModel', 'Model');
class RoadPrice extends AppModel
{
    public $name = "RoadPrice";
    public function getRoadPrice($place_1,$place_2){
        $condition = array(
          'OR'=>array(
              array('place_start'=>$place_1,'place_end'=>$place_2),
              array('place_start'=>$place_2,'place_end'=>$place_1)
          )
        );
        $data = $this->find('first',array('conditions'=>$condition));
        return $data;
    }
}