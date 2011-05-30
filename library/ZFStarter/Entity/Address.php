<?php

namespace ZFStarter\Entity;

/**
 * @Entity(repositoryClass="ZFStarter\Entity\Repository\AddressRepository")
 * 
 */
class Address implements \Zend_Acl_Resource_Interface
{
    /**
     * @Id @GeneratedValue
     * @Column(type="bigint")
     * @var integer
     */
    protected $id;
    
    /**
     * @ManyToOne(targetEntity="Person", inversedBy="addresses")
     * @JoinColumn(name="person_id", referencedColumnName="id",onDelete="CASCADE",onUpdate="CASCADE")
     */
    protected $person;


    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $street;
    
    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $city;
    
    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $state;
    
    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $country;
    
    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $postalcode;

    /**
     * Implemnation of Zend_Acl_Resource_Interface
     */
    public function getResourceId() {
        return 'address';
    }











    

    /**
     * Get id
     *
     * @return bigint $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set street
     *
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Get street
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get state
     *
     * @return string $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    /**
     * Get postalcode
     *
     * @return string $postalcode
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }
    
    /**
     * Set customer
     *
     * @param ZFStarter\Entity\Person $customer
     */
    public function setCustomer(\ZFStarter\Entity\Person $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Get customer
     *
     * @return ZFStarter\Entity\Person $customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
    /**
     * Set person
     *
     * @param ZFStarter\Entity\Person $person
     */
    public function setPerson(\ZFStarter\Entity\Person $person)
    {
        $this->person = $person;
    }

    /**
     * Get person
     *
     * @return ZFStarter\Entity\Person $person
     */
    public function getPerson()
    {
        return $this->person;
    }
}