<?php

namespace Blog\Controller;

use Blog\Entity\Post;
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
            $blogPost = new Post();
            $form->bind($blogPost);
            $form->setInputFilter(new AddPost());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                /**
                 * @var \Blog\Service\BlogService $blogService
                 */
                $blogService = $this->getServiceLocator()->get('Blog\Service\BlogService');
                $blogService->save($blogPost);
            }
        }

        return new ViewModel(array(
            'form' => $form,
        ));
    }
}
