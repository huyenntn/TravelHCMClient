<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tour\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class TourRepository extends AbstractTableGateway{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway) {
       $this->tableGateway = $tableGateway;
    }
    
    public function getTourById($id){
        $rowset = $this->tableGateway->select(['tourId' => $id]);
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

    

    public function saveTour(Tour $tour) {
        $data = [
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

        if ($tour->tourId) {
            $this->tableGateway->update($data, [
                'tourId' => $tour->tourId
            ]);
        } else {
            $this->tableGateway->insert($data);
//            return $this->getUser($user->id);
        }
    }
   
}
