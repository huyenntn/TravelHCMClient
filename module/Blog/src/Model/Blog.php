<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Blog {
    public $blogId;
    public $blogName;
    public $blogContent;
    public $writedate;
    public $blogImage;


    public function getArrayCopy(){
        return [
            'blogId' => $this->blogId,
            'blogName' => $this->blogName,
            'blogContent' => $this->blogContent,
            'writedate' => $this->writedate,
            'blogImage' => $this->blogImage,
        ];
    }
    public function exchangeArray(array $data){
        $this->blogId = !empty($data['blogId'])?$data['blogId']:NULL;
        $this->blogName = !empty($data['blogName'])?$data['blogName']:'';
        $this->blogContent = !empty($data['blogContent'])?$data['blogContent']:NULL;
        $this->writedate = !empty($data['writedate'])?$data['writedate']:NULL;
        $this->blogImage = !empty($data['blogImage'])?$data['blogImage']:NULL;
    }
    function getBlogId() {
        return $this->blogId;
    }

    function getBlogName() {
        return $this->blogName;
    }

    function getBlogContent() {
        return $this->blogContent;
    }

    function getWritedate() {
        return $this->writedate;
    }

    function getBlogImage() {
        return $this->blogImage;
    }

    function setBlogId($blogId) {
        $this->blogId = $blogId;
    }

    function setBlogName($blogName) {
        $this->blogName = $blogName;
    }

    function setBlogContent($blogContent) {
        $this->blogContent = $blogContent;
    }

    function setWritedate($writedate) {
        $this->writedate = $writedate;
    }

    function setBlogImage($blogImage) {
        $this->blogImage = $blogImage;
    }


}
