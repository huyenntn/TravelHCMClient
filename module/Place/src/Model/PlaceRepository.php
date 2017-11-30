<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Place\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Predicate\Like;
/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class PlaceRepository extends AbstractTableGateway{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway) {
       $this->tableGateway = $tableGateway;
    }
    
    public function getPlaceById($id){
        $rowset = $this->tableGateway->select(['placeId' => $id]);
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


    public function savePlace(Place $place) {
        $data = [
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

        if ($place->placeId) {
            $this->tableGateway->update($data, [
                'placeId' => $place->placeId
            ]);
        } else {
            $this->tableGateway->insert($data);
//            return $this->getUser($user->id);
        }
    }
    
    public function getPlaceByCategory($placecategoryId){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->where(['placecategoryId'=>$placecategoryId]);
        return $this->tableGateway->selectWith($sqlSelect);
    }
    public function search($like){
        $where = new \Zend\Db\Sql\Where();
        $where->like('placeName', '%' . $like . '%');
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->where($where);
        return $this->tableGateway->selectWith($sqlSelect);
    }
}
