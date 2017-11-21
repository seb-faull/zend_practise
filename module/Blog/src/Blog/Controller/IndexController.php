<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        $form = new Add();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            //* @ToDo Save Blog Post

        }

        return new ViewModel(array(
            'form' => $form,
        ));

    }
}
