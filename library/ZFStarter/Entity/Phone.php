<?php

namespace ZFStarter\Entity;

/**
 * @Entity(repositoryClass="ZFStarter\Entity\Repository\PhoneRepository")
 * 
 */
class Phone
{
    /**
     * @Id @GeneratedValue
     * @Column(type="bigint")
     * @var integer
     */
    protected $id;
    
    /**
     * @ManyToOne(targetEntity="Person", inversedBy="phones")
     * @JoinColumn(name="person_id", referencedColumnName="id",onDelete="CASCADE",onUpdate="CASCADE")
     */
    protected $person;

    /**
     * @Column(type="string",length="255")
     * @var string
     */
    protected $number;
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
     * Set number
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return string $number
     */
    public function getNumber()
    {
        return $this->number;
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