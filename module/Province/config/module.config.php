<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Province;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'province' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/province[/:action]',
                    'defaults' => [
                        'controller' => Controller\ProvinceController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ProvinceController::class => Controller\Factory\ProvinceControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'my_auth_service' => \Zend\Authentication\AuthenticationService::class,
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'view_helper_config' => [
        'flashmessenger' => [
            'message_open_format' => '<div%s><ul><li>',
            'message_separator_string' => '</li><li>',
            'message_close_string' => '</li></ul></div>',
        ],
    ],
];
