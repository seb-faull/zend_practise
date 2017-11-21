<?php

namespace Blog\InputFilter;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\ValidatorChain;


class AddPost extends InputFilter
{
    public function __construct();
    {
        $title = new Input('title');
        $title->setRequired(true);


    }

    protected function getTitleValidatorChain()
    {
        // Title's Minimum & Maximum character length
        $stringLength = new StringLength();
        $stringLength->setMin(5);
        $stringLength->setMax(50);

        $validatorChain = new ValidatorChain();
        $validatorChain->attach(new Alnum(true));
    }
}
