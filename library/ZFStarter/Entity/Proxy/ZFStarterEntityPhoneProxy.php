<?php

namespace ZFStarter\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class ZFStarterEntityPhoneProxy extends \ZFStarter\Entity\Phone implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    private function _load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    
    public function getId()
    {
        $this->_load();
        return parent::getId();
    }

    public function setNumber($number)
    {
        $this->_load();
        return parent::setNumber($number);
    }

    public function getNumber()
    {
        $this->_load();
        return parent::getNumber();
    }

    public function setCustomer(\ZFStarter\Entity\Person $customer)
    {
        $this->_load();
        return parent::setCustomer($customer);
    }

    public function getCustomer()
    {
        $this->_load();
        return parent::getCustomer();
    }

    public function setPerson(\ZFStarter\Entity\Person $person)
    {
        $this->_load();
        return parent::setPerson($person);
    }

    public function getPerson()
    {
        $this->_load();
        return parent::getPerson();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'person', 'number');
    }
}