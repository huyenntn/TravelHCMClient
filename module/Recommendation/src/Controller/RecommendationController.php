<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Recommendation\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;
use Recommendation\Model\Recommendation;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Recommendation\Model\RecommendationRepository;
use Budget\Model\BudgetRepository;
use Companion\Model\CompanionRepository;
use Weather\Model\WeatherRepository;
use Placecategory\Model\PlacecategoryRepository;
use Zend\View\Model\JsonModel;

class RecommendationController extends AbstractActionController {

    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }

    public function indexAction() {
        $listBudget = $this->containerInterface->get(BudgetRepository::class)->fetchAll();
        $listCompanion = $this->containerInterface->get(CompanionRepository::class)->fetchAll();
        $listWeather = $this->containerInterface->get(WeatherRepository::class)->fetchAll();
        $listPlaceCategory = $this->containerInterface->get(PlacecategoryRepository::class)->fetchAll();

        $selectBudget = [];
        foreach ($listBudget as $budget) {
            $selectBudget[$budget->budgetId] = $budget->budgetName;
        }
        $selectCompanion = [];
        foreach ($listCompanion as $companion) {
            $selectCompanion[$companion->companionId] = $companion->companionName;
        }
        $selectWeather = [];
        foreach ($listWeather as $weather) {
            $selectWeather[$weather->weatherId] = $weather->weatherName;
        }

        $selectPlaceCategory = [];
        $selectPlaceCategory[0] = 'Tất cả';
        foreach ($listPlaceCategory as $placeCategory) {
            $selectPlaceCategory[$placeCategory->placecategoryId] = $placeCategory->placecategoryName;
        }

        $form = new \Recommendation\Form\RecommendationForm();
        $form->get('budgetId')->setAttribute('options', $selectBudget);
        $form->get('companionId')->setAttribute('options', $selectCompanion);
        $form->get('weatherId')->setAttribute('options', $selectWeather);

        $form->get('budgetId')->setValue(4);
        $form->get('companionId')->setValue(6);
        $form->get('weatherId')->setValue(5);

        $placeCategoryForm = new \Place\Form\PlaceForm();
        $placeCategoryForm->get('placecategoryId')->setAttribute('options', $selectPlaceCategory);

        $request = $this->getRequest();
        if (isset($_POST['categoryId'])) {
            $categoryId = $request->getPost('categoryId');
        } else {
            $categoryId = 0;
        }
        if (isset($_POST['budgetId'])) {
            $budgetId = $request->getPost('budgetId');
        } else {
            $budgetId = 4;
        }
        if (isset($_POST['companionId'])) {
            $companionId = $request->getPost('companionId');
        } else {
            $companionId = 6;
        }
        if (isset($_POST['weatherId'])) {
            $weatherId = $request->getPost('weatherId');
        } else {
            $weatherId = 5;
        }

        if ($weatherId == 5 && $companionId == 6 && $budgetId == 4) {
            $context = NULL;
        } else {
            $context = $this->containerInterface->get(\Context\Model\ContextRepository::class)->getContext($budgetId, $companionId, $weatherId);
        }
        $topPlace = [];
        if ($request->isXmlHttpRequest()) {
            $user_session = new Container('user');
            if ($user_session->offsetExists('user')) {
                $user = $user_session->user;
                $userId = $user->userId;
                if ($context == NULL) {
                    if ($categoryId == 0) {
                        $listRecommend = $this->containerInterface->get(\Rating\Model\RatingRepository::class)->topRating();
                    } else {
                        $listRecommend = $this->containerInterface->get(\Rating\Model\RatingRepository::class)->topRatingByCategory($categoryId);
                    }
                    foreach ($listRecommend as $rs) {
                        $placeId = $rs->placeId;
                        $topPlace[] = $this->containerInterface->get(\Place\Model\PlaceRepository::class)->getPlaceById($placeId);
                    }
                } else {
                    if ($categoryId == 0) {
                        $listRecommend = $this->containerInterface->get(RecommendationRepository::class)->getRecommendation($userId, $context->contextId);
                    } else {
                        $listRecommend = $this->containerInterface->get(RecommendationRepository::class)->getRecommendationByCategoryPlace($userId, $context->contextId, $categoryId);
                    }
                    foreach ($listRecommend as $rs) {
                        $placeId = $rs->recommendPlaceId;
                        $topPlace[] = $this->containerInterface->get(\Place\Model\PlaceRepository::class)->getPlaceById($placeId);
                    }
                }
            } else {
                if ($categoryId == 0) {
                    $listRecommend = $this->containerInterface->get(\Rating\Model\RatingRepository::class)->topRating();
                } else {
                    $listRecommend = $this->containerInterface->get(\Rating\Model\RatingRepository::class)->topRatingByCategory($categoryId);
                }
                foreach ($listRecommend as $rs) {
                    $placeId = $rs->placeId;
                    $topPlace[] = $this->containerInterface->get(\Place\Model\PlaceRepository::class)->getPlaceById($placeId);
                }
            }

            $jsData = array();
            $idx = 0;
            foreach ($topPlace as $sampledata) {
                $jsData[$idx++] = $sampledata;
            }
            $view = new JsonModel($jsData);
            return $view;
        }

        $user_session = new Container('user');
        if ($user_session->offsetExists('user')) {
            $isLogin = TRUE;
        } else {
            $isLogin = FALSE;
        }
        if ($isLogin == FALSE) {
            $form->setAttribute('onsubmit', 'return notifi()');
        } else {
            $form->setAttribute('id', 'form-context');
        }
        return new ViewModel([
            'form' => $form,
            'placeCategoryForm' => $placeCategoryForm,
            'login' => $isLogin
        ]);
    }

}
