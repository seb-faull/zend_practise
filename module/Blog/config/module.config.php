<?php

namespace Blog;

return array(
  'controllers' => [
    'factories' => [
        Blog\Controller\IndexController::class => InvokableFactory::class,
    ],
  ],
);
