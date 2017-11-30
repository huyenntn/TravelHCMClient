<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Recommendation\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Recommendation {
    public $userId;
    public $contextId;
    public $recommendPlaceId;
//    public $budgetid;
//    public $budgetName;
//    public $companionId;
//    public $companionName;
//    public $weatherId;
//    public $weatherName;
//    public $placeName;
    public $placecategoryId;
//    public $placecategoryName;
//    public $imgUrl;
//    public $address;
//    public $websiteaddress;
//    public $description;


    public function getArrayCopy(){
        return [
            'userId' => $this->userId,
            'contextId' => $this->contextId,
            'recommendPlaceId' => $this->recommendPlaceId,
            'placecategoryId' => $this->placecategoryId,
//            'budgetid' => $this->budgetid,
//            'budgetName' => $this->budgetName,
//            'companionId' => $this->companionId,
//            'companionName' => $this->companionName,
//            'weatherId' => $this->weatherId,
//            'weatherName' => $this->weatherName,
        ];
    }
    public function exchangeArray(array $data){
        $this->userId = !empty($data['userId'])?$data['userId']:NULL;
        $this->contextId = !empty($data['contextId'])?$data['contextId']:'';
        $this->recommendPlaceId = !empty($data['recommendPlaceId'])?$data['recommendPlaceId']:NULL;
        $this->placecategoryId = !empty($data['placecategoryId'])?$data['placecategoryId']:NULL;
//        $this->budgetid = !empty($data['budgetid'])?$data['budgetid']:NULL;
//        $this->budgetName = !empty($data['budgetName'])?$data['budgetName']:NULL;
//        $this->companionId = !empty($data['companionId'])?$data['companionId']:NULL;
//        $this->companionName = !empty($data['companionName'])?$data['companionName']:NULL;
//        $this->weatherId = !empty($data['weatherId'])?$data['weatherId']:NULL;
//        $this->weatherName = !empty($data['weatherName'])?$data['weatherName']:NULL;
        
    }
    
    function getUserId() {
        return $this->userId;
    }

    function getContextId() {
        return $this->contextId;
    }

    function getRecommendPlaceId() {
        return $this->recommendPlaceId;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setContextId($contextId) {
        $this->contextId = $contextId;
    }

    function setRecommendPlaceId($recommendPlaceId) {
        $this->recommendPlaceId = $recommendPlaceId;
    }
    function getPlacecategoryId() {
        return $this->placecategoryId;
    }

    function setPlacecategoryId($placecategoryId) {
        $this->placecategoryId = $placecategoryId;
    }



}
