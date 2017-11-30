<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tour\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Tour {
    public $tourId;
    public $tourName;
    public $price;
    public $unit;
    public $dateStart;
    public $dateEnd;
    public $dayNumber;
    public $nightNumber;
    public $seatNumber;
    public $content;
    public $image;
    public $transport;
    public $bookNumber;
    
    public function getArrayCopy(){
        return [
            'tourId' => $this->tourId,
            'tourName' => $this->tourName,
            'price' => $this->price,
            'unit' => $this->unit,
            'dateStart' => $this->dateStart,
            'dateEnd' => $this->dateEnd,
            'dayNumber' => $this->dayNumber,
            'nightNumber' => $this->nightNumber,
            'seatNumber' => $this->seatNumber,
            'content' => $this->content,
            'image' => $this->image,
            'transport' => $this->transport,
            'bookNumber' => $this->bookNumber,
        ];
    }
    public function exchangeArray(array $data){
        $this->tourId = !empty($data['tourId'])?$data['tourId']:NULL;
        $this->tourName = !empty($data['tourName'])?$data['tourName']:'';
        $this->price = !empty($data['price'])?$data['price']:NULL;
        $this->unit = !empty($data['unit'])?$data['unit']:NULL;
        $this->dateStart = !empty($data['dateStart'])?$data['dateStart']:NULL;
        $this->dateEnd = !empty($data['dateEnd'])?$data['dateEnd']:NULL;
        $this->dayNumber = !empty($data['dayNumber'])?$data['dayNumber']:NULL;
        $this->nightNumber = !empty($data['nightNumber'])?$data['nightNumber']:NULL;
        $this->seatNumber = !empty($data['seatNumber'])?$data['seatNumber']:NULL;
        $this->content = !empty($data['content'])?$data['content']:NULL;
        $this->image = !empty($data['image'])?$data['image']:NULL;
        $this->transport = !empty($data['transport'])?$data['transport']:NULL;
        $this->bookNumber = !empty($data['bookNumber'])?$data['bookNumber']:NULL;
    }
    function getTourId() {
        return $this->tourId;
    }

    function getTourName() {
        return $this->tourName;
    }

    function getPrice() {
        return $this->price;
    }

    function getUnit() {
        return $this->unit;
    }

    function getDateStart() {
        return $this->dateStart;
    }

    function getDateEnd() {
        return $this->dateEnd;
    }

    function getDayNumber() {
        return $this->dayNumber;
    }

    function getNightNumber() {
        return $this->nightNumber;
    }

    function getSeatNumber() {
        return $this->seatNumber;
    }

    function getContent() {
        return $this->content;
    }

    function getImage() {
        return $this->image;
    }

    function getTransport() {
        return $this->transport;
    }

    function getBookNumber() {
        return $this->bookNumber;
    }

    function setTourId($tourId) {
        $this->tourId = $tourId;
    }

    function setTourName($tourName) {
        $this->tourName = $tourName;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setDateStart($dateStart) {
        $this->dateStart = $dateStart;
    }

    function setDateEnd($dateEnd) {
        $this->dateEnd = $dateEnd;
    }

    function setDayNumber($dayNumber) {
        $this->dayNumber = $dayNumber;
    }

    function setNightNumber($nightNumber) {
        $this->nightNumber = $nightNumber;
    }

    function setSeatNumber($seatNumber) {
        $this->seatNumber = $seatNumber;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setTransport($transport) {
        $this->transport = $transport;
    }

    function setBookNumber($bookNumber) {
        $this->bookNumber = $bookNumber;
    }


}
