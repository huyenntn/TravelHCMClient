<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Rating\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Rating {
    public $userId;
    public $placeId;
    public $contextId;
    public $rating;
    public $placecategoryId;

    public function getArrayCopy(){
        return [
            'userId' => $this->userId,
            'placeId' => $this->placeId,
            'contextId' => $this->contextId,
            'rating' => $this->rating,
            'placecategoryId' => $this->placecategoryId,
        ];
    }
    public function exchangeArray(array $data){
        $this->userId = !empty($data['userId'])?$data['userId']:NULL;
        $this->placeId = !empty($data['placeId'])?$data['placeId']:'';
        $this->contextId = !empty($data['contextId'])?$data['contextId']:NULL;
        $this->rating = !empty($data['rating'])?$data['rating']:NULL;
        $this->placecategoryId = !empty($data['placecategoryId'])?$data['placecategoryId']:NULL;

    }
    function getUserId() {
        return $this->userId;
    }

    function getPlaceId() {
        return $this->placeId;
    }

    function getContextId() {
        return $this->contextId;
    }

    function getRating() {
        return $this->rating;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setPlaceId($placeId) {
        $this->placeId = $placeId;
    }

    function setContextId($contextId) {
        $this->contextId = $contextId;
    }

    function setRating($rating) {
        $this->rating = $rating;
    }
    function getPlacecategoryId() {
        return $this->placecategoryId;
    }

    function setPlacecategoryId($placecategoryId) {
        $this->placecategoryId = $placecategoryId;
    }



    
}
