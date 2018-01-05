<?php
App::uses('AppController', 'Controller');
class LongWaysController extends AppController
{
    public $uses = array('LongWay');
    var $components = array('Common');
    var $layout = 'admin';

    public function add_long_way()
    {
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Thêm taxi đường dài');
            if ($this->request->is('post')) {
                //điểm đi
                $place_start = $this->request->data['place_start'];
                $tmp_start = explode(',',$place_start);
                $count_start = count($tmp_start);
                if(isset($tmp_start[$count_start-2])){
                    $city_start = $tmp_start[$count_start-2];
                }else{
                    $city_start ='';
                }

                if(isset($tmp_start[$count_start-3])){
                    $district_start = $tmp_start[$count_start-3];
                }else{
                    $district_start ='';
                }

                if(isset($tmp_start[$count_start-4])){
                    $street_start  = $tmp_start[$count_start-4];
                }else{
                    $street_start = '';
                }

                //điểm đến
                $place_end = $this->request->data['place_end'];
                $tmp_end = explode(',',$place_end);
                $count_start = count($tmp_end);
                if(isset($tmp_end[$count_start-2])){
                    $city_end = $tmp_end[$count_start-2];
                }else{
                    $city_end='';
                }

                if(isset($tmp_end[$count_start-3])){
                    $district_end = $tmp_end[$count_start-3];
                }else{
                    $district_end='';
                }

                if(isset($tmp_end[$count_start-4])){
                    $street_end = $tmp_end[$count_start-4];
                }else{
                    $street_end='';
                }
                $coord_start = $this->Common->get_coordinates($city_start, $street_start, $district_start);
                $coord_end = $this->Common->get_coordinates($city_end, $street_end, $district_end);
                if(($coord_start!= False) && ($coord_end!= False)){
                    $data_map = $this->Common->GetDrivingDistance($coord_start['lat'],$coord_end['lat'],$coord_start['long'],$coord_end['long']);
                    if($data_map!=False){
                        $km = $data_map['km'];
                    }else{
                        $km = 0;
                    }
                    var_dump($km);
                    //prices






                }else{
                    echo "<script>alert('Nhập sai cú pháp')</script>";
                }




            }
        }
    }
}