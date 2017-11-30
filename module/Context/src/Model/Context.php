<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Context\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Context {
    public $contextId;
    public $budgetId;
    public $companionId;
    public $weatherId;
    
    public function getArrayCopy(){
        return [
            'contextId' => $this->contextId,
            'budgetId' => $this->budgetId,
            'companionId' => $this->companionId,
            'weatherId' => $this->weatherId,
        ];
    }
    public function exchangeArray(array $data){
        $this->contextId = !empty($data['contextId'])?$data['contextId']:NULL;
        $this->budgetId = !empty($data['budgetId'])?$data['budgetId']:'';
        $this->companionId = !empty($data['companionId'])?$data['companionId']:NULL;
        $this->weatherId = !empty($data['weatherId'])?$data['weatherId']:NULL;
    }
    function getContextId() {
        return $this->contextId;
    }

    function getBudgetId() {
        return $this->budgetId;
    }

    function getCompanionId() {
        return $this->companionId;
    }

    function getWeatherId() {
        return $this->weatherId;
    }

    function setContextId($contextId) {
        $this->contextId = $contextId;
    }

    function setBudgetId($budgetId) {
        $this->budgetId = $budgetId;
    }

    function setCompanionId($companionId) {
        $this->companionId = $companionId;
    }

    function setWeatherId($weatherId) {
        $this->weatherId = $weatherId;
    }


}
