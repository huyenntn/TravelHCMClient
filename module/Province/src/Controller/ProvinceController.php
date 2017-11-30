<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Province\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;
use Province\Model\Province;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Province\Model\ProvinceRepository;
use Rating\Model\RatingRepository;
use Context\Model\ContextRepository;
use Zend\View\Model\JsonModel;

class ProvinceController extends AbstractActionController {

    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }

    public function indexAction() {
//        $listplace = $this->containerInterface->get(PlaceRepository::class)->fetchAll();
//        $listPlaceCategory = $this->containerInterface->get(PlacecategoryRepository::class)->fetchAll();
//        $selectPlaceCategory = [];
//        $selectPlaceCategory[0] = 'Tất cả';
//        foreach ($listPlaceCategory as $placeCategory) {
//            $selectPlaceCategory[$placeCategory->placecategoryId] = $placeCategory->placecategoryName;
//        }
//        $placeCategoryForm = new \Place\Form\PlaceForm();
//        $placeCategoryForm->get('placecategoryId')->setAttribute('options', $selectPlaceCategory);
//        $request = $this->getRequest();
//        if (isset($_POST['categoryId'])) {
//            $categoryId = $request->getPost('categoryId');
//        } else {
//            $categoryId = 0;
//        }
//        if ($request->isXmlHttpRequest()) {
//            if ($categoryId == 0) {
//                $listPlace = $this->containerInterface->get(PlaceRepository::class)->fetchAll();
//            } else {
//                $listPlace = $this->containerInterface->get(PlaceRepository::class)->getPlaceByCategory($categoryId);
//            }
//
//            $jsData = array();
//            $idx = 0;
//            foreach ($listPlace as $sampledata) {
//                $jsData[$idx++] = $sampledata;
//            }
//            $view = new JsonModel($jsData);
//            return $view;
//        } else {
//            return new ViewModel(['listplace' => $listplace,
//                'placeCategoryForm' => $placeCategoryForm]);
//        }
    }
}
