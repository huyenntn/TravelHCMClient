<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Placecategory\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Placecategory {
    public $placecategoryId;
    public $placecategoryName;
    
    public function getArrayCopy(){
        return [
            'placecategoryId' => $this->placecategoryId,
            'placecategoryName' => $this->placecategoryName,
        ];
    }
    public function exchangeArray(array $data){
        $this->placecategoryId = !empty($data['placecategoryId'])?$data['placecategoryId']:NULL;
        $this->placecategoryName = !empty($data['placecategoryName'])?$data['placecategoryName']:'';
    }
    function getPlacecategoryId() {
        return $this->placecategoryId;
    }

    function getPlacecategoryName() {
        return $this->placecategoryName;
    }

    function setPlacecategoryId($placecategoryId) {
        $this->placecategoryId = $placecategoryId;
    }

    function setPlacecategoryName($placecategoryName) {
        $this->placecategoryName = $placecategoryName;
    }




}
