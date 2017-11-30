<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Rating\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;
use Rating\Model\Rating;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Rating\Model\RatingRepository;

class RatingController extends AbstractActionController
{
    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }
    
    public function indexAction() {
        return new ViewModel();
    }
    
    public function detailAction(){

    }
    
}
