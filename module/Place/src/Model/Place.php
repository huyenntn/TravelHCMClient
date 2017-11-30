<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Place\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Place {
    public $placeId;
    public $placeName;
    public $placecategoryId;
    public $imgUrl;
    public $latitude;
    public $longtitude;
    public $address;
    public $websiteaddress;
    public $description;
    public $provinceId;
    
    public function getArrayCopy(){
        return [
            'placeId' => $this->placeId,
            'placeName' => $this->placeName,
            'placecategoryId' => $this->placecategoryId,
            'imgUrl' => $this->imgUrl,
            'latitude' => $this->latitude,
            'longtitude' => $this->longtitude,
            'address' => $this->address,
            'websiteaddress' => $this->websiteaddress,
            'description' => $this->description,
            'provinceId' => $this->provinceId,
        ];
    }
    public function exchangeArray(array $data){
        $this->placeId = !empty($data['placeId'])?$data['placeId']:NULL;
        $this->placeName = !empty($data['placeName'])?$data['placeName']:'';
        $this->placecategoryId = !empty($data['placecategoryId'])?$data['placecategoryId']:NULL;
        $this->imgUrl = !empty($data['imgUrl'])?$data['imgUrl']:NULL;
        $this->latitude = !empty($data['latitude'])?$data['latitude']:NULL;
        $this->longtitude = !empty($data['longtitude'])?$data['longtitude']:NULL;
        $this->address = !empty($data['address'])?$data['address']:NULL;
        $this->websiteaddress = !empty($data['websiteaddress'])?$data['websiteaddress']:NULL;
        $this->description = !empty($data['description'])?$data['description']:NULL;
        $this->provinceId = !empty($data['provinceId'])?$data['provinceId']:NULL;
    }
    function getPlaceId() {
        return $this->placeId;
    }

    function getPlaceName() {
        return $this->placeName;
    }

    function getPlacecategoryId() {
        return $this->placecategoryId;
    }

    function getImgUrl() {
        return $this->imgUrl;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getLongtitude() {
        return $this->longtitude;
    }

    function getAddress() {
        return $this->address;
    }

    function getWebsiteaddress() {
        return $this->websiteaddress;
    }

    function getDescription() {
        return $this->description;
    }

    function getProvinceId() {
        return $this->provinceId;
    }

    function setPlaceId($placeId) {
        $this->placeId = $placeId;
    }

    function setPlaceName($placeName) {
        $this->placeName = $placeName;
    }

    function setPlacecategoryId($placecategoryId) {
        $this->placecategoryId = $placecategoryId;
    }

    function setImgUrl($imgUrl) {
        $this->imgUrl = $imgUrl;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongtitude($longtitude) {
        $this->longtitude = $longtitude;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setWebsiteaddress($websiteaddress) {
        $this->websiteaddress = $websiteaddress;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setProvinceId($provinceId) {
        $this->provinceId = $provinceId;
    }


}
