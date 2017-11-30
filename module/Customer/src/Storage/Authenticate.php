<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Storage;
use Zend\Authentication\AuthenticationService;
/**
 * Description of Authenticate
 *
 * @author Ngoc
 */
class Authenticate {
    public $authenticationservice;
    public function __construct(AuthenticationService $authenticationService){
        $this->authenticationService = $authenticationService;
        
    }
    public function login($identity, $credential, $user_agent, $ip_address)
    {
        $this->getAuthService()->getAdapter()->setIdentity($identity)->setCredential($credential);
        $result = $this->getAuthService()->authenticate();
        if($result->isValid())
        {
            $columnsToOmit = ['password'];
            $user=$this->getAuthService()->getAdapter()->getResultRowObject(null,$columnsToOmit);
            $user->ip_address = $ip_address;
            $user->user_agent = $user_agent;
            $this->storeIdentity($user);
            
        }
        return $result;
    }
    public function getAuthService()
    {
        return $this->authenticationService;
    }
    public function toArray(){
        $hidraty=json_encode($this->hasIdentity());
        return json_decode($hidraty,true);
    }
    public function storeIdentity($identity)
    {
        $this->getAuthService()->getStorage()->write($identity);
    }
    public function hasIdentity()
    {
        return $this->getAuthService()->getStorage()->read();
    }
    public function logout()
    {
        $this->getAuthService()->getStorage()->clear();
    }
}
