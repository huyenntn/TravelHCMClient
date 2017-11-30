<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Blog\Model\BlogRepository;

class BlogController extends AbstractActionController {

    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }

    public function indexAction() {
        $listblog = $this->containerInterface->get(BlogRepository::class)->fetchAll();
        return new ViewModel(['listblog' => $listblog]);
    }

    public function detailAction() {
        $blogId = (int) $this->params()->fromQuery('blogId', 0);
        if ($blogId == 0) {
            exit('invalid blog');
        }
        try {
            $blog = $this->containerInterface->get(BlogRepository::class)->getBlogById($blogId);
        } catch (\Exception $e) {
            exit('Error with Blog table');
        }
        return new ViewModel(['blog' => $blog]);
    }

}
