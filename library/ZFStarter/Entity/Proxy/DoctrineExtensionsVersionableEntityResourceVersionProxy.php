<?php

namespace ZFStarter\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class DoctrineExtensionsVersionableEntityResourceVersionProxy extends \DoctrineExtensions\Versionable\Entity\ResourceVersion implements \Doctrine\ORM\Proxy\Proxy
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

    public function getResourceName()
    {
        $this->_load();
        return parent::getResourceName();
    }

    public function getResourceId()
    {
        $this->_load();
        return parent::getResourceId();
    }

    public function getVersionedData($key = NULL)
    {
        $this->_load();
        return parent::getVersionedData($key);
    }

    public function getVersion()
    {
        $this->_load();
        return parent::getVersion();
    }

    public function getSnapshotDate()
    {
        $this->_load();
        return parent::getSnapshotDate();
    }

    public function setResourceName($resourceName)
    {
        $this->_load();
        return parent::setResourceName($resourceName);
    }

    public function setResourceId($resourceId)
    {
        $this->_load();
        return parent::setResourceId($resourceId);
    }

    public function setVersionedData($versionedData)
    {
        $this->_load();
        return parent::setVersionedData($versionedData);
    }

    public function setVersion($version)
    {
        $this->_load();
        return parent::setVersion($version);
    }

    public function setSnapshotDate($snapshotDate)
    {
        $this->_load();
        return parent::setSnapshotDate($snapshotDate);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'resourceName', 'resourceId', 'versionedData', 'version', 'snapshotDate');
    }
}