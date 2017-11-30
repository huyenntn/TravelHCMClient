<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Context\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;
use Context\Model\Context;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Context\Model\ContextRepository;
use Rating\Model\RatingRepository;

class ContextController extends AbstractActionController
{
    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }
    
    public function indexAction() {
        $listcontext = $this->containerInterface->get(ContextRepository::class)->fetchAll();
        return new ViewModel(['listcontext' => $listcontext]);
    }
}
