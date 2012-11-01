<?php

namespace Unoegohh\RetailBundle\Entity;


class Feedback
{

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