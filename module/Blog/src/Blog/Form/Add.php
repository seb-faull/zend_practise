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

        // Text Field
        $title = new Element\Text('title');
        $title->setLabel('Title');
        $title->setAttribute('class', 'form-control');

        // Url Slug
        $slug = new Element\Text('slug');
        $slug->setLabel('Slug');
        $slug->setAttribute('class', 'form-control');

        // Text Area
        $content = new Element\Textarea('content');
        $content->setLabel('Content');
        $content->setAttribute('class', 'form-control');

        // Dropdown Selector
        $category = new Element\Select('category');
        $category->setLabel('Category');
        $category->setAttribute('class', 'form-control');
        $category->setValueOptions(array(
            1 => 'PHP',
            2 => 'Zend Framework',
            3 => 'MySQL',
        ));

        // Submit Button
        $submit = new Element\Submit('submit');
        $submit->setValue('Add Post');
        $submit->setAttribute('class', 'btn btn-primary');

        $this->add($title);
        $this->add($slug);
        $this->add($content);
        $this->add($category);
        $this->add($submit);
    }
}
