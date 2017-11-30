<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Companion\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Companion {
    public $companionId;
    public $companionName;
    
    public function getArrayCopy(){
        return [
            'companionId' => $this->companionId,
            'companionName' => $this->companionName,
        ];
    }
    public function exchangeArray(array $data){
        $this->companionId = !empty($data['companionId'])?$data['companionId']:NULL;
        $this->companionName = !empty($data['companionName'])?$data['companionName']:'';
    }
    function getCompanionId() {
        return $this->companionId;
    }

    function getCompanionName() {
        return $this->companionName;
    }

    function setCompanionId($companionId) {
        $this->companionId = $companionId;
    }

    function setCompanionName($companionName) {
        $this->companionName = $companionName;
    }


}
