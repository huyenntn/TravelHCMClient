<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Tour\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;
use Tour\Form\CustomerForm;
use Tour\Model\Customer;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Tour\Model\TourRepository;
use Province\Model\ProvinceRepository;
use Zend\View\Model\JsonModel;

class TourController extends AbstractActionController {

    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }

    public function indexAction() {
        $listProvince = $this->containerInterface->get(ProvinceRepository::class)->getAllProvince();
        $selectProvince = [];
        $selectProvince[0] = 'Tất cả';
        foreach ($listProvince as $province) {
            $selectProvince[$province->province_id] = $province->provinceName;
        }
        $provinceForm = new \Province\Form\ProvinceForm();
        $provinceForm->get('province_id')->setAttribute('options', $selectProvince);
        $request = $this->getRequest();
        if (isset($_POST['province_id'])) {
            $provinceId = $request->getPost('province_id');
        } else {
            $provinceId = 0;
        }
        if ($request->isXmlHttpRequest()) {
            if ($provinceId == 0) {
                $listtour = $this->containerInterface->get(TourRepository::class)->fetchAll();
            } else {
                $listtour_province = $this->containerInterface->get(ProvinceRepository::class)->getTourByProvince($provinceId);
                $listtour = [];
                foreach ($listtour_province as $tour_province){
                    $listtour[] = $this->containerInterface->get(TourRepository::class)->getTourById($tour_province->tour_id);
                }
            }

            $jsData = array();
            $idx = 0;
            foreach ($listtour as $sampledata) {
                $jsData[$idx++] = $sampledata;
            }
            $view = new JsonModel($jsData);
            return $view;
        } else {
            $listtour = $this->containerInterface->get(TourRepository::class)->fetchAll();
            return new ViewModel([
                'listtour' => $listtour,
                'provinceForm' => $provinceForm]);
        }
    }

    public function detailAction() {
        $user_session = new Container('user');
        if ($user_session->offsetExists('user')) {
            $login = TRUE;
        } else {
            $login = FALSE;
        }
        $tourId = (int) $this->params()->fromQuery('tourId', 0);
        if ($tourId == 0) {
            exit('invalid tour');
        }
        try {
            $tour = $this->containerInterface->get(TourRepository::class)->getTourById($tourId);
        } catch (\Exception $e) {
            exit('Error with Tour table');
        }
        return new ViewModel(['tour' => $tour, 'login' => $login]);
    }

}
