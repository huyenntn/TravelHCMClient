<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Customer {
    public $userId;
    public $email;
    public $password;
    public $name;
    public $cmnd;
    public $banknumber;
    public $bankname;
    public $address;
    public $phone;
    
    public function getArrayCopy(){
        return [
            'userId' => $this->userId,
            'email' => $this->email,
            'password' => $this->password,
            'name' => $this->name,
            'cmnd' => $this->cmnd,
            'banknumber' => $this->banknumber,
            'bankname' => $this->bankname,
            'address' => $this->address,
            'phone' => $this->phone
        ];
    }
    public function exchangeArray(array $data){
        $this->userId = !empty($data['userId'])?$data['userId']:NULL;
        $this->email = !empty($data['email'])?$data['email']:'';
        $this->password = !empty($data['password'])?$data['password']:NULL;
        $this->name = !empty($data['name'])?$data['name']:NULL;
        $this->cmnd = !empty($data['cmnd'])?$data['cmnd']:NULL;
        $this->banknumber = !empty($data['banknumber'])?$data['banknumber']:NULL;
        $this->bankname = !empty($data['bankname'])?$data['bankname']:NULL;
        $this->address = !empty($data['address'])?$data['address']:NULL;
        $this->phone = !empty($data['phone'])?$data['phone']:NULL;
    }
    function getUserId() {
        return $this->userId;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getName() {
        return $this->name;
    }

    function getCmnd() {
        return $this->cmnd;
    }

    function getBanknumber() {
        return $this->banknumber;
    }

    function getBankname() {
        return $this->bankname;
    }

    function getAddress() {
        return $this->address;
    }

    function getPhone() {
        return $this->phone;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCmnd($cmnd) {
        $this->cmnd = $cmnd;
    }

    function setBanknumber($banknumber) {
        $this->banknumber = $banknumber;
    }

    function setBankname($bankname) {
        $this->bankname = $bankname;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }



}
