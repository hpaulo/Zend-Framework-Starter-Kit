<?php

namespace ZFStarter\Entity;

/**
 * @Entity(repositoryClass="ZFStarter\Entity\Repository\ActorRepository")
 */
class Customer extends Person
{

    protected $roleId = 'customer';

    /**
     * Add addresses
     *
     * @param ZFStarter\Entity\Address $addresses
     */
    public function addAddresses(\ZFStarter\Entity\Address $addresses)
    {
        $this->addresses[] = $addresses;
    }

    /**
     * Get addresses
     *
     * @return Doctrine\Common\Collections\Collection $addresses
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
    /**
     * Add phones
     *
     * @param ZFStarter\Entity\Phone $phones
     */
    public function addPhones(\ZFStarter\Entity\Phone $phones)
    {
        $this->phones[] = $phones;
    }

    /**
     * Get phones
     *
     * @return Doctrine\Common\Collections\Collection $phones
     */
    public function getPhones()
    {
        return $this->phones;
    }
    /**
     * Set openid
     *
     * @param string $openid
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;
    }

    /**
     * Get openid
     *
     * @return string $openid
     */
    public function getOpenid()
    {
        return $this->openid;
    }
}