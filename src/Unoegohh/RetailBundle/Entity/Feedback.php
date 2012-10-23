<?php

namespace Unoegohh\RetailBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class Feedback
{

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('context', new NotBlank());
        $metadata->addPropertyConstraint('contacts', new NotBlank());
    }

    protected $theme;

    protected $name;

    protected $contacts;

    protected $context;

    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

    public function setContext($context)
    {
        $this->context = $context;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

}