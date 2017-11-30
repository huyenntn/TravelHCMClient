<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Recommendation\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class RecommendationRepository extends AbstractTableGateway {

    public $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function getRecommendation($userId, $contextId) {
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->join('place', 'place.placeId = recommendation.recommendPlaceId',array('placecategoryId'))
                ->where(['contextId' => $contextId, 'userId' => $userId]);
        return $this->tableGateway->selectWith($sqlSelect);
    }

    public function getRecommendationByCategoryPlace($userId, $contextId, $placecategoryId){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->join('place', 'place.placeId = recommendation.recommendPlaceId',array('placecategoryId'))
                ->where(['contextId' => $contextId, 'userId' => $userId, 'placecategoryId'=>$placecategoryId]);
        return $this->tableGateway->selectWith($sqlSelect);
    }
}
