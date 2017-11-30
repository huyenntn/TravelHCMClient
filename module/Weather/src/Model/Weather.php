<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Weather\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Weather {
    public $weatherId;
    public $weatherName;
    
    public function getArrayCopy(){
        return [
            'weatherId' => $this->weatherId,
            'weatherName' => $this->weatherName,
        ];
    }
    public function exchangeArray(array $data){
        $this->weatherId = !empty($data['weatherId'])?$data['weatherId']:NULL;
        $this->weatherName = !empty($data['weatherName'])?$data['weatherName']:'';
    }
    function getWeatherId() {
        return $this->weatherId;
    }

    function getWeatherName() {
        return $this->weatherName;
    }

    function setWeatherId($weatherId) {
        $this->weatherId = $weatherId;
    }

    function setWeatherName($weatherName) {
        $this->weatherName = $weatherName;
    }


}
