<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Place\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;
use Place\Model\Place;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Place\Model\PlaceRepository;
use Rating\Model\RatingRepository;
use Context\Model\ContextRepository;
use Placecategory\Model\PlacecategoryRepository;
use Zend\View\Model\JsonModel;

class PlaceController extends AbstractActionController {

    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }

    public function indexAction() {
        $listplace = $this->containerInterface->get(PlaceRepository::class)->fetchAll();
        $listPlaceCategory = $this->containerInterface->get(PlacecategoryRepository::class)->fetchAll();
        $selectPlaceCategory = [];
        $selectPlaceCategory[0] = 'Tất cả';
        foreach ($listPlaceCategory as $placeCategory) {
            $selectPlaceCategory[$placeCategory->placecategoryId] = $placeCategory->placecategoryName;
        }
        $placeCategoryForm = new \Place\Form\PlaceForm();
        $placeCategoryForm->get('placecategoryId')->setAttribute('options', $selectPlaceCategory);
        $request = $this->getRequest();
        if (isset($_POST['categoryId'])) {
            $categoryId = $request->getPost('categoryId');
        } else {
            $categoryId = 0;
        }
        if ($request->isXmlHttpRequest()) {
            if ($categoryId == 0) {
                $listPlace = $this->containerInterface->get(PlaceRepository::class)->fetchAll();
            } else {
                $listPlace = $this->containerInterface->get(PlaceRepository::class)->getPlaceByCategory($categoryId);
            }

            $jsData = array();
            $idx = 0;
            foreach ($listPlace as $sampledata) {
                $jsData[$idx++] = $sampledata;
            }
            $view = new JsonModel($jsData);
            return $view;
        } else {
            return new ViewModel(['listplace' => $listplace,
                'placeCategoryForm' => $placeCategoryForm]);
        }
    }

    public function detailAction() {
        $flashMessenger = $this->flashMessenger();
        $request = $this->getRequest();
        if (!$request->isPost()) {

            $user_session = new Container('user');
            if ($user_session->offsetExists('user')) {
                $user = $user_session->user;
                $userId = $user->userId;
                $haslogin = true;
            } else {
                $haslogin = FALSE;
            }

            $placeId = (int) $this->params()->fromQuery('placeId', 0);
            if ($placeId == 0) {
                exit('invalid place');
            }
            try {
                $place = $this->containerInterface->get(PlaceRepository::class)->getPlaceById($placeId);
                if ($user_session->offsetExists('user')) {
                    if ($this->containerInterface->get(RatingRepository::class)->getAvgRating($userId, $placeId) != NULL) {
                        $rating = $this->containerInterface->get(RatingRepository::class)->getAvgRating($userId, $placeId)->rating;
                    } else {
                        $rating = -1;
                    }
                } else {
                    $rating = -1;
                }
            } catch (\Exception $e) {
                exit('Error with Place table');
            }
            return new ViewModel(['place' => $place, 'rating' => $rating, 'haslogin' => $haslogin, 'placeId' => $placeId]);
        } else {
            $ratingObj = new \Rating\Model\Rating();
            $score = $this->params()->fromQuery('score', 0);
            $user_session = new Container('user');
            $request = $this->getRequest();
            $weatherId = $request->getPost('weatherId');
            $budgetId = $request->getPost('budgetId');
            $companionId = $request->getPost('companionId');
            $placeId = $request->getPost('placeId');
            $place = $this->containerInterface->get(PlaceRepository::class)->getPlaceById($placeId);
            $rating = $request->getPost('rating');
            if ($user_session->offsetExists('user')) {
                $haslogin = TRUE;
                $user = $user_session->user;
                $userId = $user->userId;
                $ratingObj->setUserId($userId);
                $ratingObj->setRating($rating);
                $ratingObj->setPlaceId($placeId);
                $contextrow = $this->containerInterface->get(ContextRepository::class)->getContext($budgetId, $companionId, $weatherId);
                $contextId = $contextrow->contextId;
                $ratingObj->setContextId($contextrow->contextId);
                $checkRating = $this->containerInterface->get(RatingRepository::class)->getRating($userId, $placeId, $contextId);
                if ($checkRating == NULL) {
                    $this->containerInterface->get(RatingRepository::class)->saveRating($ratingObj);
                } else {
                    $this->containerInterface->get(RatingRepository::class)->updateRating($ratingObj);
                }
//                $flashMessenger->addSuccessMessage('Cảm ơn bạn đã đánh giá!');
                return new ViewModel(['place' => $place, 'rating' => $rating, 'haslogin' => $haslogin, 'placeId' => $placeId, 'rated' => TRUE]);
            } else {
//                $flashMessenger->addSuccessMessage('Lỗi');
                $placeId = $this->params()->fromQuery('placeId', 0);
                $haslogin = FALSE;
                return new ViewModel(['place' => $place, 'rating' => $rating, 'haslogin' => $haslogin, 'placeId' => $placeId]);
            }
        }
    }

    public function searchAction() {
        $searchvalue = $this->params()->fromQuery('search', '');
        $searchrs = $this->containerInterface->get(PlaceRepository::class)->search($searchvalue);
        $view = new ViewModel([
            'searchvalue' => $searchrs,
            'searchtxt' => $searchvalue,
        ]);
        return $view;
    }

}
