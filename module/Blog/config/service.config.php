<?php

namespace Blog;

return array(
    'invokables' => array(
        'Blog\Service\BlogService' => 'Blog\Service\BlogServiceImpl',
    ),

    'factories' => array(
        'Blog\Repository\PostRepository' => function(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
              $postRepository = new \Blog\Repository\PostRepositoryImpl();
              $postRepository->setDbAdapter($serviceLocator->get('Zend\Db\Adapter\Adapter'));

              return $postRepository;
          },
    ),
);
