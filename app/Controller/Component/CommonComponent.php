<?php
App::uses('Component', 'Controller');

class CommonComponent extends Component
{
    public $components = array('Session');

    public function checkLoginAdmin()
    {
        $user = $this->Session->read('Auth.User.user_id');
        if (!empty($user)) {
            return True;
        } else {
            return False;
        }
    }

    function get_coordinates($city, $street, $province)
    {
        $address = urlencode($city.','.$street.','.$province);
        $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Poland";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 2500);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 90);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);
        $status = $response_a->status;

        if ( $status == 'ZERO_RESULTS' )
        {
            return FALSE;
        }
        else
        {
            $lat = !empty($response_a->results[0]->geometry->location->lat)?$response_a->results[0]->geometry->location->lat:0;
            $long = !empty($response_a->results[0]->geometry->location->lng)?$response_a->results[0]->geometry->location->lng:0;
            $return = array('lat' => $lat, 'long' => $long = $long);
            return $return;
        }

    }
    function GetDrivingDistance($lat1, $lat2, $long1, $long2)
    {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 2500);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 90);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        if($response_a['rows'][0]['elements'][0]['status']=='OK'){
            $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
            $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
            return array('km' => $dist, 'time' => $time);
        }else{
            return false;
        }

    }
    public function listTypeCar(){
        $data = array(
            'Car'=>array(
                '1'=>array('id'=>1,'name'=>'Xe 5 chỗ'),
                '2'=>array('id'=>2,'name'=>'Xe 7 chỗ'),
                '3'=>array('id'=>3,'name'=>'Xe 16 chỗ'),
                '4'=>array('id'=>4,'name'=>'Xe tiện chuyến'),
            )
        );
        return $data;
    }

    public function listCity(){
        $data = array(
            'City'=>array(
                '1'=>array('id'=>1,'name'=>'Hà Nội'),
                '2'=>array('id'=>2,'name'=>'Sân bay Nội Bài'),
                '3'=>array('id'=>3,'name'=>'Hà Nam'),
                '4'=>array('id'=>4,'name'=>'Nam Định'),
                '5'=>array('id'=>5,'name'=>'Ninh Bình'),
                '6'=>array('id'=>6,'name'=>'Thái Bình'),
                '7'=>array('id'=>7,'name'=>'Hải Dương'),
                '8'=>array('id'=>8,'name'=>'Hải Phòng'),
                '9'=>array('id'=>9,'name'=>'Bắc Ninh'),
                '10'=>array('id'=>10,'name'=>'Bắc Giang'),
                '11'=>array('id'=>11,'name'=>'Thái Nguyên'),
                '12'=>array('id'=>12,'name'=>'Tuyên Quang'),
                '13'=>array('id'=>13,'name'=>'Hưng Yên'),
                '14'=>array('id'=>14,'name'=>'Thanh Hóa'),
                '15'=>array('id'=>15,'name'=>'Vĩnh Phúc'),
                '16'=>array('id'=>16,'name'=>'Phú Thọ'),
                '17'=>array('id'=>17,'name'=>'Yên Bái'),
                '18'=>array('id'=>18,'name'=>'Lào Cai'),
                '19'=>array('id'=>19,'name'=>'Hoà Bình'),
                '20'=>array('id'=>20,'name'=>'Vinh'),
                '21'=>array('id'=>21,'name'=>'Quảng Ninh'),
                '22'=>array('id'=>22,'name'=>'Thanh Hóa'),
            )
        );
        return $data;
    }
    public function stripUnicode($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ',
        'D'=>'Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );

    foreach($unicode as $khongdau=>$codau) {
        $arr=explode("|",$codau);
        $str = str_replace($arr,$khongdau,$str);
    }
    return $str;
    }
    //Tạo slug
    public function createSlug($str){
        $str = trim($str);
        if($str=="") return "";
        $str = str_replace('"','',$str);
        $str = str_replace("'",'',$str);
        $str = str_replace("/",'',$str);
        $str = $this->stripUnicode($str);
        $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
        // MB_CASE_Upper / MB_CASE_TITLE / MB_CASE_LOWER
        $str = str_replace(' ','-',$str);
        return $str;

    }

    //đệ quy category
    public function cate_parent($data,$parent=0,$str="",$select=0){
        foreach($data as $item){
            $id = $item['id'];
            $name = $item['name'];
            if($item['parent_id'] == $parent){
                if($select!=0 && $id == $select ){
                    echo "<option value='$id' selected='selected'>$str $name</option>";
                }else{
                    echo "<option value='$id'>$str $name</option>";
                }
                cate_parent($data,$id,$str."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;",$select);
            }
        }
    }

}
?>