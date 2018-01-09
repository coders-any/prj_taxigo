<?php
App::uses('AppController', 'Controller');
class LongWaysController extends AppController
{
    public $uses = array('LongWay','CarTypePrice','RoadPrice');
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
                //id city
                $listCity = $this->Common->listCity();
                if(!empty($listCity)){
                    foreach ($listCity['City'] as $key=>$item_city){
                        if($item_city['name'] == trim($city_start)){
                            $id_city_start = $item_city['id'];
                        }
                        if($item_city['name'] == trim($city_end)){
                            $id_city_end = $item_city['id'];
                        }
                    }
                }



                $coord_start = $this->Common->get_coordinates($city_start, $street_start, $district_start);
                $coord_end = $this->Common->get_coordinates($city_end, $street_end, $district_end);
                if(($coord_start!= False) && ($coord_end!= False)){
                    $data_map = $this->Common->GetDrivingDistance($coord_start['lat'],$coord_end['lat'],$coord_start['long'],$coord_end['long']);
                    if($data_map!=False){
                        $km =str_replace('km','',$data_map['km']);
                        $km =str_replace(',','.',$km);
                    }else{
                        $km = 0;
                    }
                    //prices
                    $car_price5 = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.type'=>1)));
                    $car_price7 = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.type'=>2)));
                    $car_price16 = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.type'=>3)));
                    $car_discount = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.type'=>4)));
                    if($this->request->data['is_car_discount'] ==0){
                        if($km >0 && $km <=30){
                            $price_seat_number_5 = $km * $car_price5['CarTypePrice']['distance1'];
                            $price_seat_number_7 = $km * $car_price7['CarTypePrice']['distance1'];
                            $price_seat_number_16 = $km * $car_price16['CarTypePrice']['distance1'];
                            $price_car_discount = 0;
                        }else if($km >=31 && $km <=60){
                            $price_seat_number_5 = 30*$car_price5['CarTypePrice']['distance1'] + ($km-30) * $car_price5['CarTypePrice']['distance2'];
                            $price_seat_number_7 = 30*$car_price7['CarTypePrice']['distance1'] + ($km-30) * $car_price7['CarTypePrice']['distance2'];
                            $price_seat_number_16 = 30*$car_price16['CarTypePrice']['distance1'] + ($km-30) * $car_price16['CarTypePrice']['distance2'];
                            $price_car_discount = 0;
                        }else if($km >=61 && $km <=80){
                            $price_seat_number_5 = 30*$car_price5['CarTypePrice']['distance1'] + 30 * $car_price5['CarTypePrice']['distance2'] + ($km-60) * $car_price5['CarTypePrice']['distance3'];
                            $price_seat_number_7 = 30*$car_price7['CarTypePrice']['distance1'] + 30 * $car_price7['CarTypePrice']['distance2'] + ($km-60) * $car_price7['CarTypePrice']['distance3'];
                            $price_seat_number_16 = 30*$car_price16['CarTypePrice']['distance1'] + 30 * $car_price16['CarTypePrice']['distance2'] + ($km-60) * $car_price16['CarTypePrice']['distance3'];
                            $price_car_discount = 0;
                        }else if($km >=81){
                            $price_seat_number_5 = 30*$car_price5['CarTypePrice']['distance1'] + 30 * $car_price5['CarTypePrice']['distance2'] + 20 * $car_price5['CarTypePrice']['distance3']+ ($km-80) * $car_price5['CarTypePrice']['distance4'];
                            $price_seat_number_7 = 30*$car_price7['CarTypePrice']['distance1'] + 30 * $car_price7['CarTypePrice']['distance2'] + 20 * $car_price7['CarTypePrice']['distance3']+ ($km-80) * $car_price7['CarTypePrice']['distance4'];
                            $price_seat_number_16 = 30*$car_price16['CarTypePrice']['distance1'] + 30 * $car_price16['CarTypePrice']['distance2'] + 20 * $car_price16['CarTypePrice']['distance3']+ ($km-80) * $car_price16['CarTypePrice']['distance4'];
                            $price_car_discount = 0;
                        }
                    }else if($this->request->data['is_car_discount'] ==1){
                        if($km >0 && $km <=30){
                            $price_seat_number_5 = 0;
                            $price_seat_number_7 = 0;
                            $price_seat_number_16 = 0;
                            $price_car_discount = $km * $car_discount['CarTypePrice']['distance1'];
                        }else if($km >=31 && $km <=60){
                            $price_seat_number_5 = 0;
                            $price_seat_number_7 = 0;
                            $price_seat_number_16 = 0;
                            $price_car_discount = 30*$car_discount['CarTypePrice']['distance1'] + ($km-30) * $car_discount['CarTypePrice']['distance2'];

                        }else if($km >=61 && $km <=80){
                            $price_seat_number_5 = 0;
                            $price_seat_number_7 = 0;
                            $price_seat_number_16 = 0;
                            $price_car_discount = 30*$car_discount['CarTypePrice']['distance1'] + 30 * $car_discount['CarTypePrice']['distance2'] + ($km-60) * $car_discount['CarTypePrice']['distance3'];

                        }else if($km >=81){
                            $price_seat_number_5 = 0;
                            $price_seat_number_7 = 0;
                            $price_seat_number_16 = 0;
                            $price_car_discount = 30*$car_discount['CarTypePrice']['distance1'] + 30 * $car_discount['CarTypePrice']['distance2'] + 20 * $car_discount['CarTypePrice']['distance3']+ ($km-80) * $car_discount['CarTypePrice']['distance4'];
                        }
                    }

                    //Road Price
                    $data_road_prices = $this->RoadPrice->getRoadPrice($city_start,$city_end);
                    if(!empty($data_road_prices)){
                        $road_prices = $data_road_prices['RoadPrice']['price'];
                    }else{
                        $road_prices = 0;
                    }
                    $data = array(
                        'LongWay'=>array(
                            'title'=>$this->request->data['title'],
                            'slug'=>$this->Common->createSlug($this->request->data['title']),
                            'place_start_id'=>$id_city_start,
                            'place_end_id'=>$id_city_end,
                            'place_start_name'=>$this->request->data['place_start'],
                            'place_end_name'=>$this->request->data['place_end'],
                            'image'=>$this->request->data['image'],
                            'is_car_discount'=>$this->request->data['is_car_discount'],
                            'km'=>$km,
                            'road_prices'=>$road_prices,
                            'price_seat_number_5'=>$price_seat_number_5,
                            'price_seat_number_7'=>$price_seat_number_7,
                            'price_seat_number_16'=>$price_seat_number_16,
                            'price_car_discount'=>$price_car_discount,
                            'content'=>$this->request->data['content'],
                            'tag'=>$this->request->data['tag'],
                        )
                    );
                    if($this->LongWay->save($data)){
                        $this->Session->setFlash(__('Thêm dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'longways','action' => 'list_long_way'));
                    }else{
                        $this->Session->setFlash(__('Thêm dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'longways','action' => 'list_long_way'));
                    }
                }else{
                    echo "<script>alert('Vui lòng nhập lại!')</script>";
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function list_long_way(){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Danh sách taxi đường dài');
            $data = $this->LongWay->find('all');
            $this->set('data', $data);
        }else{
            return $this->redirect('/admin');
        }
    }
    public function edit_long_way($id = null){
        if ($this->Common->checkLoginAdmin()) {
            $this->set('title_for_layout', 'Danh sách taxi đường dài');
            if(!empty($id)){
                $data = $this->LongWay->find('first',array('conditions'=>array('LongWay.id'=>$id)));
                $this->set('data',$data);
            }
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

                //id city
                $listCity = $this->Common->listCity();
                if(!empty($listCity)){
                    foreach ($listCity['City'] as $key=>$item_city){
                        if($item_city['name'] == trim($city_start)){
                            $id_city_start = $item_city['id'];
                        }
                        if($item_city['name'] == trim($city_end)){
                            $id_city_end = $item_city['id'];
                        }
                    }
                }
                if(empty($id_city_start)){
                    echo "<script>alert('Vui lòng nhập đúng định dạng Đường, Huyện, Tỉnh, Việt Nam!')</script>";
                }
                if(empty($id_city_end)){
                    echo "<script>alert('Vui lòng nhập đúng định dạng Đường, Huyện, Tỉnh, Việt Nam!')</script>";
                }

                $coord_start = $this->Common->get_coordinates($city_start, $street_start, $district_start);
                $coord_end = $this->Common->get_coordinates($city_end, $street_end, $district_end);
                if(($coord_start!= False) && ($coord_end!= False)){
                    $data_map = $this->Common->GetDrivingDistance($coord_start['lat'],$coord_end['lat'],$coord_start['long'],$coord_end['long']);
                    if($data_map!=False){
                        $km =str_replace('km','',$data_map['km']);
                        $km =str_replace(',','.',$km);
                    }else{
                        $km = 0;
                    }
                    //prices
                    $car_price5 = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.type'=>1)));
                    $car_price7 = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.type'=>2)));
                    $car_price16 = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.type'=>3)));
                    $car_discount = $this->CarTypePrice->find('first',array('conditions'=>array('CarTypePrice.type'=>4)));

                    if($this->request->data['is_car_discount'] == 0){
                        if($km >0 && $km <=30){
                            $price_seat_number_5 = $km * $car_price5['CarTypePrice']['distance1'];
                            $price_seat_number_7 = $km * $car_price7['CarTypePrice']['distance1'];
                            $price_seat_number_16 = $km * $car_price16['CarTypePrice']['distance1'];
                            $price_car_discount = 0;
                        }else if($km >=31 && $km <=60){
                            $price_seat_number_5 = 30*$car_price5['CarTypePrice']['distance1'] + ($km-30) * $car_price5['CarTypePrice']['distance2'];
                            $price_seat_number_7 = 30*$car_price7['CarTypePrice']['distance1'] + ($km-30) * $car_price7['CarTypePrice']['distance2'];
                            $price_seat_number_16 = 30*$car_price16['CarTypePrice']['distance1'] + ($km-30) * $car_price16['CarTypePrice']['distance2'];
                            $price_car_discount = 0;
                        }else if($km >=61 && $km <=80){
                            $price_seat_number_5 = 30*$car_price5['CarTypePrice']['distance1'] + 30 * $car_price5['CarTypePrice']['distance2'] + ($km-60) * $car_price5['CarTypePrice']['distance3'];
                            $price_seat_number_7 = 30*$car_price7['CarTypePrice']['distance1'] + 30 * $car_price7['CarTypePrice']['distance2'] + ($km-60) * $car_price7['CarTypePrice']['distance3'];
                            $price_seat_number_16 = 30*$car_price16['CarTypePrice']['distance1'] + 30 * $car_price16['CarTypePrice']['distance2'] + ($km-60) * $car_price16['CarTypePrice']['distance3'];
                            $price_car_discount = 0;
                        }else if($km >=81){
                            $price_seat_number_5 = 30*$car_price5['CarTypePrice']['distance1'] + 30 * $car_price5['CarTypePrice']['distance2'] + 20 * $car_price5['CarTypePrice']['distance3']+ ($km-80) * $car_price5['CarTypePrice']['distance4'];
                            $price_seat_number_7 = 30*$car_price7['CarTypePrice']['distance1'] + 30 * $car_price7['CarTypePrice']['distance2'] + 20 * $car_price7['CarTypePrice']['distance3']+ ($km-80) * $car_price7['CarTypePrice']['distance4'];
                            $price_seat_number_16 = 30*$car_price16['CarTypePrice']['distance1'] + 30 * $car_price16['CarTypePrice']['distance2'] + 20 * $car_price16['CarTypePrice']['distance3']+ ($km-80) * $car_price16['CarTypePrice']['distance4'];
                            $price_car_discount = 0;
                        }
                    }else if($this->request->data['is_car_discount'] == 1){
                        if($km >0 && $km <=30){
                            $price_seat_number_5 = 0;
                            $price_seat_number_7 = 0;
                            $price_seat_number_16 = 0;
                            $price_car_discount = $km * $car_discount['CarTypePrice']['distance1'];
                        }else if($km >=31 && $km <=60){
                            $price_seat_number_5 = 0;
                            $price_seat_number_7 = 0;
                            $price_seat_number_16 = 0;
                            $price_car_discount = 30*$car_discount['CarTypePrice']['distance1'] + ($km-30) * $car_discount['CarTypePrice']['distance2'];

                        }else if($km >=61 && $km <=80){
                            $price_seat_number_5 = 0;
                            $price_seat_number_7 = 0;
                            $price_seat_number_16 = 0;
                            $price_car_discount = 30*$car_discount['CarTypePrice']['distance1'] + 30 * $car_discount['CarTypePrice']['distance2'] + ($km-60) * $car_discount['CarTypePrice']['distance3'];

                        }else if($km >=81){
                            $price_seat_number_5 = 0;
                            $price_seat_number_7 = 0;
                            $price_seat_number_16 = 0;
                            $price_car_discount = 30*$car_discount['CarTypePrice']['distance1'] + 30 * $car_discount['CarTypePrice']['distance2'] + 20 * $car_discount['CarTypePrice']['distance3']+ ($km-80) * $car_discount['CarTypePrice']['distance4'];
                        }
                    }
                    //Road Price
                    $data_road_prices = $this->RoadPrice->getRoadPrice($city_start,$city_end);
                    if(!empty($data_road_prices)){
                        $road_prices = $data_road_prices['RoadPrice']['price'];
                    }else{
                        $road_prices = 0;
                    }
                    $data = array(
                        'LongWay'=>array(
                            'id'=>$this->request->data['id'],
                            'title'=>$this->request->data['title'],
                            'slug'=>$this->Common->createSlug($this->request->data['title']),
                            'place_start_id'=>$id_city_start,
                            'place_end_id'=>$id_city_end,
                            'place_start_name'=>$this->request->data['place_start'],
                            'place_end_name'=>$this->request->data['place_end'],
                            'image'=>$this->request->data['image'],
                            'is_car_discount'=>$this->request->data['is_car_discount'],
                            'km'=>$km,
                            'road_prices'=>$road_prices,
                            'price_seat_number_5'=>$price_seat_number_5,
                            'price_seat_number_7'=>$price_seat_number_7,
                            'price_seat_number_16'=>$price_seat_number_16,
                            'price_car_discount'=>$price_car_discount,
                            'content'=>$this->request->data['content'],
                            'tag'=>$this->request->data['tag'],
                        )
                    );

                    if($this->LongWay->save($data)){
                        $this->Session->setFlash(__('Sửa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                        $this->redirect(array('controller' => 'longways','action' => 'list_long_way'));
                    }else{
                        $this->Session->setFlash(__('Sửa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                        $this->redirect(array('controller' => 'longways','action' => 'list_long_way'));
                    }
                }else{
                    echo "<script>alert('Vui lòng nhập lại!')</script>";
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
    public function delete_long_way($id = null){
        if ($this->Common->checkLoginAdmin()) {
            if(isset($id)){
                if($this->LongWay->delete(array('LongWay.id' => $id), true)){
                    $this->Session->setFlash(__('Xóa dữ liệu thành công !'), 'flashmessage', array('type' => 'success'), 'success');
                    $this->redirect(array('controller' => 'longways','action' => 'list_long_way'));
                }else{
                    $this->Session->setFlash(__('Xóa dữ liệu thất bại !'), 'flashmessage', array('type' => 'error'), 'error');
                    $this->redirect(array('controller' => 'longways','action' => 'list_long_way'));
                }
            }
        }else{
            return $this->redirect('/admin');
        }
    }
}