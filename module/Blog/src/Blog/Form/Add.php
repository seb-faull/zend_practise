<?php

namespace Blog\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Add extends Form
{
    // Perform the initialization of the class
    // which involves adding elements to the form.
    public function __construct()
    {
        parent:: __construct('add');

        $title = new Element\Text('title');
        $title->setLabel('Title');
        $title->setAttribute('class', 'form-control');
    }
}
