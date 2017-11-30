<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Province\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Province {
    public $tourprovinceId;
    public $tour_id;
    public $province_id;
    public $provinceName;
    
    public function getArrayCopy(){
        return [
            'tourprovinceId' => $this->tourprovinceId,
            'tour_id' => $this->tour_id,
            'province_id' => $this->province_id,
            'provinceName' => $this->provinceName,
        ];
    }
    public function exchangeArray(array $data){
        $this->tourprovinceId = !empty($data['tourprovinceId'])?$data['tourprovinceId']:NULL;
        $this->tour_id = !empty($data['tour_id'])?$data['tour_id']:NULL;
        $this->province_id = !empty($data['province_id'])?$data['province_id']:'';
        $this->provinceName = !empty($data['provinceName'])?$data['provinceName']:NULL;
    }
    function getTourprovinceId() {
        return $this->tourprovinceId;
    }

    function getTour_id() {
        return $this->tour_id;
    }

    function getProvince_id() {
        return $this->province_id;
    }

    function getProvinceName() {
        return $this->provinceName;
    }

    function setTourprovinceId($tourprovinceId) {
        $this->tourprovinceId = $tourprovinceId;
    }

    function setTour_id($tour_id) {
        $this->tour_id = $tour_id;
    }

    function setProvince_id($province_id) {
        $this->province_id = $province_id;
    }

    function setProvinceName($provinceName) {
        $this->provinceName = $provinceName;
    }


}
