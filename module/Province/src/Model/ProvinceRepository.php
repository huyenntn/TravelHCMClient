<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Province\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class ProvinceRepository extends AbstractTableGateway{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway) {
       $this->tableGateway = $tableGateway;
    }
    
    public function getAllProvince(){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->columns(['province_id' => new \Zend\Db\Sql\Predicate\Expression('DISTINCT(province_id)')])
                ->join('province', 'province.provinceId = tour_province.province_id', ['provinceName']);
        return $this->tableGateway->selectWith($sqlSelect);
    }
    
    public function fetchAll(){ 
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->join('province', 'province.provinceId = tour_province.province_id', ['provinceName']);
        return $this->tableGateway->selectWith($sqlSelect);
    }


    public function getTourByProvince($provinceId){
        $sqlSelect = $this->tableGateway->getSql()
                ->select()
                ->join('tour', 'tour.tourId = tour_province.tour_id', [])
                ->where(['province_id'=>$provinceId]);
        return $this->tableGateway->selectWith($sqlSelect);
    }

}
