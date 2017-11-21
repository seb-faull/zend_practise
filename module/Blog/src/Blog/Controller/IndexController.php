<?php

namespace Blog\Controller;

use Blog\Form\Add;
use Blog\InputFilter\AddPost;
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
            $form->setInputFilter(new AddPost());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $data = $form->getData();
                /**
                 *  @ToDo Save post here
                 */
            }
        }

        return new ViewModel(array(
            'form' => $form,
        ));
    }
}
