<?php

namespace Blog\InputFilter;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\ValidatorChain;
use Zend\Session\ValidatorChain;


class AddPost extends InputFilter
{
    public function __construct();
    {
        $title = new Input('title');
        $title->setRequired(true);
        $title->setValidatorChain($this->getTitleValidatorChain());
        $title->setFilterChain($this->getStringTrimFilterChain());

        $slug = new Input('slug');
        $slug->setRequired(true);
        $slug->setValidatorChain($this->getSlugValidatorChain());
        $slug->setFilterChain($this->getStringTrimFilterChain());

        $content = new Input('content');
        $content->setRequired(true);
        $content->setValidatorChain($this->getContentValidatorChain());
        $content->setFilterChain($this->getStringTrimFilterChain());

        $this->add($title);
        $this->add($slug;
        $this->add($content);
    }

    protected function getStringTrimFilterChain()
    {
        $filterChain = new FilterChain();
        $filterChain->attach(new StringTrim());

        return $filterChain;
    }

    protected function getContentValidatorChain()
    {
        $stringLength = new StringLength();
        $stringLength->setMin(10);

        $validatorChain = new ValidatorChain();
        $validatorChain->attach($stringLength);

        return $validatorChain;
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
