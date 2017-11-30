<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Rating\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class RatingRepository extends AbstractTableGateway {

    public $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function getRatingByUserPlace($userId, $placeId) {
        $rowset = $this->tableGateway->select(['userId' => $userId, 'placeId' => $placeId]);
        $row = $rowset->current();
        if (!$row) {
            return NULL;
        }
        return $row;
    }

    public function getRating($userId, $placeId, $contextId) {
        $rowset = $this->tableGateway->select(['userId' => $userId, 'placeId' => $placeId, 'contextId' => $contextId]);
        $row = $rowset->current();
        if (!$row) {
            return NULL;
        }
        return $row;
    }

     public function getAvgRating($userId, $placeId ){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->columns(['userId','placeId','rating' => new \Zend\Db\Sql\Predicate\Expression('ROUND(AVG(rating))')])
                ->where(['userId'=>$userId,'placeId'=>$placeId])
                ->group(['userId','placeId']);
        return $this->tableGateway->selectWith($sqlSelect)->current();
    }
    
    public function topRating(){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->join('place', 'place.placeId = rating.placeId',array('placecategoryId'))
                ->columns(['placeId','rating' => new \Zend\Db\Sql\Predicate\Expression('ROUND(AVG(rating))')])
                ->group(['placeId'])
                
                ->order(['rating DESC'])
                ->limit(10)
                ->offset(1);
        return $this->tableGateway->selectWith($sqlSelect);
    }
    
    public function saveRating(Rating $rating) {
        $data = [
            'userId' => $rating->userId,
            'placeId' => $rating->placeId,
            'contextId' => $rating->contextId,
            'rating' => $rating->rating,
        ];

        $this->tableGateway->insert($data);
    }

    public function updateRating(Rating $rating) {
        $data = [
            'userId' => $rating->userId,
            'placeId' => $rating->placeId,
            'contextId' => $rating->contextId,
            'rating' => $rating->rating,
        ];

        $this->tableGateway->update($data, [
            'userId' => $rating->userId,
            'placeId' => $rating->placeId,
            'contextId' => $rating->contextId,
        ]);
    }
    
    public function topRatingByCategory($placecategoryId){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->join('place', 'place.placeId = rating.placeId',array('placecategoryId'))
                ->where(['placecategoryId'=>$placecategoryId])
                ->columns(['placeId','rating' => new \Zend\Db\Sql\Predicate\Expression('ROUND(AVG(rating))')])
                ->group(['placeId'])
                ->order(['rating DESC'])
                ->limit(10)
                ->offset(1);
        return $this->tableGateway->selectWith($sqlSelect);
    }
   

}
