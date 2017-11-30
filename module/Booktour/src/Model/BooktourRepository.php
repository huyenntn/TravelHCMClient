<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Booktour\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class BooktourRepository extends AbstractTableGateway{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway) {
       $this->tableGateway = $tableGateway;
    }

    public function fetchAll(){
        return $this->tableGateway->select();
    }
    
    public function insertBook(Booktour $book){
        $data = [
            'tourId' => $book->tourId,
            'userId' => $book->userId,
            'bookDate' => $book->bookDate,
            'seatNumber' => $book->seatNumber,
            'price' => $book->price,
            'unit' => $book->unit,
            'paid' => $book->paid,
            'status' => $book->status,
        ];
        return $this->tableGateway->insert($data);
    }
    
    public function getBooktourById($bookId){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->where(['booktourId' => $bookId]);
        return $this->tableGateway->selectWith($sqlSelect);
    }
    public function getBooktourByUser($userId){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->join('tour', 'tour.tourId = book_tour.tourId',['tourName'])
                ->order('booktourId DESC')
                ->where(['userId' => $userId]);
        return $this->tableGateway->selectWith($sqlSelect);
    }
    public function getSeatByTour($tourId){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->columns(['seatNumber' => new \Zend\Db\Sql\Predicate\Expression('SUM(seatNumber)')])
                ->where(['tourId'=>$tourId]);
        return $this->tableGateway->selectWith($sqlSelect)->current();
    }
   
}
