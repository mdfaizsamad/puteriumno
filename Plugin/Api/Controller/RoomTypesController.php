<?php
App::uses('ApiAppController', 'Api.Controller');

class RoomTypesController extends ApiAppController {

    public $uses = ['Accommodation.RoomType'];
  
    public function price(){

        $room_type_id = $this->request->query('room_type_id');

        $data = $this->RoomType->find('first',['recursive'=>-1,'conditions'=>['RoomType.id'=>$room_type_id],'fields'=>['rate','promotional','promotional_rate']]);
        $price = $data['RoomType']['rate'];
        $promotional = $data['RoomType']['promotional'];
        $promotional_price = $data['RoomType']['promotional_rate'];

        $this->loadModel('SysRoom');
        $data_room = $this->SysRoom->find('list',['recursive'=>-1,'conditions'=>['SysRoom.room_type_id'=>$room_type_id],'fields'=>array('id','room_number')]);
        // $room = $data_room['SysRoom']['id'];

        $this->_serialized(compact('price','promotional','promotional_price','data_room'));
    }

}
