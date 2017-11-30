<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tour\Model\TourRepository;
use Zend\View\Model\JsonModel;
use Rating\Model\RatingRepository;
use Place\Model\PlaceRepository;

class IndexController extends AbstractActionController {

    public $containerInterface;

    public function __construct(\Interop\Container\ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }

    public function indexAction() {
        $listRecommend = $this->containerInterface->get(RatingRepository::class)->topRating();
            $topPlace = array();
            foreach ($listRecommend as $rs) {
                $placeId = $rs->placeId;
                $topPlace[] = $this->containerInterface->get(PlaceRepository::class)->getPlaceById($placeId);
            }
        $listtour = $this->containerInterface->get(TourRepository::class)->fetchAll();
        return new ViewModel(['listtour' => $listtour,'topPlaces'=>$topPlace]);
    }

}
