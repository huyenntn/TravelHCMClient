<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Booktour\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Booktour\Model\BooktourRepository;
use Tour\Model\TourRepository;
use Zend\Session\Container;


class BooktourController extends AbstractActionController {

    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }

    public function indexAction() {
        $tourId = $this->params()->fromQuery('tourId', 0);
        $tour = $this->containerInterface->get(TourRepository::class)->getTourById($tourId);
        $user_session = new Container('user');

        $form = new \Booktour\Form\BooktourForm();
        $form->get('tourId')->setAttribute('value', $tourId);
        $form->get('paid')->setValue(0);
        $form->get('status')->setValue(0);
        $form->get('bookDate')->setValue(0);
        $form->get('unit')->setValue('VND');
        
        $seatNumber= (int)$this->containerInterface->get(BooktourRepository::class)->getSeatByTour($tourId)->seatNumber;
        $sumSeat = $tour->seatNumber;
        $blankSeat = $sumSeat - $seatNumber;
        $selectSeatNumber = [];
        $blank=1;
//        for($blank = 1;$blank<=$blankSeat;$blank++){
//            $selectSeatNumber[] = $blank;
//            var_dump($blank);
//        }
        while ($blank <= $blankSeat){
            $selectSeatNumber[$blank] = $blank;
            $blank++;
        }
        $form->get('seatNumber')->setAttribute('options', $selectSeatNumber);
        
        
        if ($user_session->offsetExists('user')) {
            $user = $user_session->user;
            $userId = $user->userId;
            $form->get('userId')->setAttribute('value', $userId);
        }
        $request = $this->getRequest();
        
        if (!$request->isPost()) {
            $viewModel = new ViewModel([
                'form' => $form,
                'tour' => $tour,
                'user' => $user,
            ]);
            return $viewModel;
        }
        $form->setData($request->getPost());
        $booktour = new \Booktour\Model\Booktour();
        if (!$form->isValid()) {
            exit('not valid');
        }
        $price = (int)$tour->price * (int)$request->getPost('seatNumber');
        $booktour->exchangeArray($form->getData());
        $booktour->setPrice($price);
        $this->containerInterface->get(BooktourRepository::class)->insertBook($booktour);
        return $this->redirect()->toRoute('booktour', [
                        'action' => 'history'
            ]);
    }
    
    public function historyAction(){
        $user_session = new Container('user');
        if ($user_session->offsetExists('user')) {
            $user = $user_session->user;
            $userId = $user->userId;
            $listhistory = $this->containerInterface->get(BooktourRepository::class)->getBooktourByUser($userId);
            return new ViewModel([
                'listhistory' => $listhistory
            ]);
        }
    }

}
