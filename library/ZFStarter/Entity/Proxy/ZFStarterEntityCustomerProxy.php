<?php

namespace ZFStarter\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class ZFStarterEntityCustomerProxy extends \ZFStarter\Entity\Customer implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function addAddresses(\ZFStarter\Entity\Address $addresses)
    {
        $this->_load();
        return parent::addAddresses($addresses);
    }

    public function getAddresses()
    {
        $this->_load();
        return parent::getAddresses();
    }

    public function addPhones(\ZFStarter\Entity\Phone $phones)
    {
        $this->_load();
        return parent::addPhones($phones);
    }

    public function getPhones()
    {
        $this->_load();
        return parent::getPhones();
    }

    public function setOpenid($openid)
    {
        $this->_load();
        return parent::setOpenid($openid);
    }

    public function getOpenid()
    {
        $this->_load();
        return parent::getOpenid();
    }

    public function updated()
    {
        $this->_load();
        return parent::updated();
    }

    public function getRoleId()
    {
        $this->_load();
        return parent::getRoleId();
    }

    public function getId()
    {
        $this->_load();
        return parent::getId();
    }

    public function setFname($fname)
    {
        $this->_load();
        return parent::setFname($fname);
    }

    public function getFname()
    {
        $this->_load();
        return parent::getFname();
    }

    public function setLname($lname)
    {
        $this->_load();
        return parent::setLname($lname);
    }

    public function getLname()
    {
        $this->_load();
        return parent::getLname();
    }

    public function setEmail($email)
    {
        $this->_load();
        return parent::setEmail($email);
    }

    public function getEmail()
    {
        $this->_load();
        return parent::getEmail();
    }

    public function setRole($role)
    {
        $this->_load();
        return parent::setRole($role);
    }

    public function getRole()
    {
        $this->_load();
        return parent::getRole();
    }

    public function setCreatedAt($createdAt)
    {
        $this->_load();
        return parent::setCreatedAt($createdAt);
    }

    public function getCreatedAt()
    {
        $this->_load();
        return parent::getCreatedAt();
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->_load();
        return parent::setUpdatedAt($updatedAt);
    }

    public function getUpdatedAt()
    {
        $this->_load();
        return parent::getUpdatedAt();
    }

    public function setTimezone($timezone)
    {
        $this->_load();
        return parent::setTimezone($timezone);
    }

    public function getTimezone()
    {
        $this->_load();
        return parent::getTimezone();
    }

    public function toArray()
    {
        $this->_load();
        return parent::toArray();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'fname', 'lname', 'email', 'openid', 'timezone', 'created_at', 'updated_at', 'addresses', 'phones');
    }
}