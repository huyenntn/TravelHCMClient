<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class BlogRepository extends AbstractTableGateway{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway) {
       $this->tableGateway = $tableGateway;
    }
    
    public function getBlogById($id){
        $rowset = $this->tableGateway->select(['blogId' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(\sprintf(
                    'Could not find row with identifier %d', $id
            ));
        }
        return $row;
    }
    
    public function fetchAll(){
        return $this->tableGateway->select();
    }

    

    public function saveBlog(Blog $blog) {
        $data = [
            'blogId' => $this->blogId,
            'blogName' => $this->blogName,
            'blogContent' => $this->blogContent,
            'writedate' => $this->writedate,
            'blogImage' => $this->blogImage,
        ];

        if ($blog->blogId) {
            $this->tableGateway->update($data, [
                'blogId' => $blog->blogId
            ]);
        } else {
            $this->tableGateway->insert($data);
//            return $this->getUser($user->id);
        }
    }
   
}
