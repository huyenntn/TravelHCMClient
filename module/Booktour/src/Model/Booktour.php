<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Booktour\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Booktour {
    public $booktourId;
    public $tourId;
    public $userId;
    public $bookDate;
    public $seatNumber;
    public $price;
    public $unit;
    public $paid;
    public $status;
    public $tourName;


    public function getArrayCopy(){
        return [
            'booktourId' => $this->booktourId,
            'tourId' => $this->tourId,
            'userId' => $this->userId,
            'bookDate' => $this->bookDate,
            'seatNumber' => $this->seatNumber,
            'price' => $this->price,
            'unit' => $this->unit,
            'paid' => $this->paid,
            'status' => $this->status,
            'tourName' => $this->tourName
        ];
    }
    public function exchangeArray(array $data){
        $this->booktourId = !empty($data['booktourId'])?$data['booktourId']:NULL;
        $this->tourId = !empty($data['tourId'])?$data['tourId']:'';
        $this->userId = !empty($data['userId'])?$data['userId']:'';
        $this->bookDate = !empty($data['bookDate'])?$data['bookDate']:'';
        $this->seatNumber = !empty($data['seatNumber'])?$data['seatNumber']:'';
        $this->price = !empty($data['price'])?$data['price']:'';
        $this->unit = !empty($data['unit'])?$data['unit']:'';
        $this->paid = !empty($data['paid'])?$data['paid']:'';
        $this->status = !empty($data['status'])?$data['status']:'';
        $this->tourName = !empty($data['tourName'])?$data['tourName']:'';
    }
    function getBooktourId() {
        return $this->booktourId;
    }

    function getTourId() {
        return $this->tourId;
    }

    function getUserId() {
        return $this->userId;
    }

    function getBookDate() {
        return $this->bookDate;
    }

    function getSeatNumber() {
        return $this->seatNumber;
    }

    function getPrice() {
        return $this->price;
    }

    function getUnit() {
        return $this->unit;
    }

    function getPaid() {
        return $this->paid;
    }

    function getStatus() {
        return $this->status;
    }

    function setBooktourId($booktourId) {
        $this->booktourId = $booktourId;
    }

    function setTourId($tourId) {
        $this->tourId = $tourId;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setBookDate($bookDate) {
        $this->bookDate = $bookDate;
    }

    function setSeatNumber($seatNumber) {
        $this->seatNumber = $seatNumber;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setPaid($paid) {
        $this->paid = $paid;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getTourName() {
        return $this->tourName;
    }

    function setTourName($tourName) {
        $this->tourName = $tourName;
    }




}
