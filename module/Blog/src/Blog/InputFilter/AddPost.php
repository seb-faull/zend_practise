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
        $title->setValidatorChain($this->getTitleValidatorChain());

        $slug = new Input('slug');
        $slug->setRequired(true);
        $slug->setValidatorChain($this->getSlugValidatorChain());

        $content = new Input('content');
        $content->setRequired(true);
    }

    protected function getSlugValidatorChain()
    {
      // Title's Minimum & Maximum character length
      $stringLength = new StringLength();
      $stringLength->setMin(5);
      $stringLength->setMax(50);

      $validatorChain = new ValidatorChain();
      $validatorChain->attach($stringLength);

      return $validatorChain;
    }

    protected function getTitleValidatorChain()
    {
        // Title's Minimum & Maximum character length
        $stringLength = new StringLength();
        $stringLength->setMin(5);
        $stringLength->setMax(50);

        $validatorChain = new ValidatorChain();
        $validatorChain->attach(new Alnum(true));
        $validatorChain->attach($stringLength);

        return $validatorChain;
    }
}
