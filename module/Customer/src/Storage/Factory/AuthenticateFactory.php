<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Storage\Factory;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;
use Zend\Authentication\AuthenticationService;
/**
 * Description of AuthenticateFactory
 *
 * @author Ngoc
 */
class AuthenticateFactory {
    public function __invoke(\Interop\Container\ContainerInterface $container) {
        $dbAdapter =$container->get(\Zend\Db\Adapter\AdapterInterface::class);
        $dbTableAuthAdapter = new AuthAdapter($dbAdapter,
            'users',
            'email',
            'password',
            'name',
            'cmnd','banknumber','bankname','address','phone',
            "MD5('123') AND level = 1");
        $authService = new AuthenticationService();
        $authService->setAdapter($dbTableAuthAdapter);
        $authService->setStorage(new \Customer\Storage\AuthStorage());
        return new \Customer\Storage\Authenticate($authService);
    }
}
