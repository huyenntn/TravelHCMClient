<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Placecategory\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Placecategory\Model\PlacecategoryRepository;

class PlacecategoryController extends AbstractActionController {

    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }

    public function indexAction() {
        $listplacecategory = $this->containerInterface->get(PlacecategoryRepository::class)->fetchAll();
        return new ViewModel(['listplacecategory' => $listplacecategory]);
    }

    

}
