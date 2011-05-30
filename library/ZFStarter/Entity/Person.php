<?php

namespace ZFStarter\Entity;

/**
 * @Entity(repositoryClass="ZFStarter\Entity\Repository\PersonRepository")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="role", type="string")
 * @DiscriminatorMap({"person" = "Person", "customer" = "Customer"})
 * 
 */
class Person implements \Zend_Acl_Role_Interface
{

    protected $roleId = 'guest';

    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="bigint")
     */
    protected $id;
    
    /**
     * @Column(type="string",length=250)
     * @var string
     */
    protected $fname;
    
    /**
     * @Column(type="string",length=250)
     * @var string
     */
    protected $lname;
    
    /**
     * @Column(type="string",length=250)
     * @var string
     */
    protected $email;

    /**
     * @Column(type="string",length=255,unique="true")
     * @var string
     */
    protected $openid;
    
    /**
     * @Column(type="string", length=100)
     * @var string
     */
    protected $timezone;
    
    /**
     * @Column(type="datetime")
     * @var string
     */
    protected $created_at;
    
    /**
     * @Column(type="datetime")
     * @var string
     */
    protected $updated_at;
    
    /**
     * @OneToMany(targetEntity="Address", mappedBy="person")
     */
    protected $addresses;

    /**
     * @OneToMany(targetEntity="Phone", mappedBy="person")
     */
    protected $phones;    
    
    
    public function __construct()
    {
        // constructor is never called by Doctrine
        $this->created_at = $this->updated_at = new \DateTime('now');
    }
    
    /**
     * @PreUpdate
     */
    public function updated()
    {
        $this->updated_at = new \DateTime('now');
    }

    /**
     * Implemenation of getRoleId for Zend_Acl_Role_Interface
     * @return string | null
     */
    public function getRoleId() {
        return $this->roleId;
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
     * Set fname
     *
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * Get fname
     *
     * @return string $fname
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set lname
     *
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * Get lname
     *
     * @return string $lname
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Get role
     *
     * @return string $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime $createdAt
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return datetime $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * Set timezone
     *
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * Get timezone
     *
     * @return string $timezone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }
    
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

    /**
     * toArray function
     *
     */
    public function toArray() {

        return array(
            'id'            => $this->id,
            'fname'         => $this->fname,
            'lname'         => $this->lname,
            'email'         => $this->email,
            'openid'        => $this->openid,
            'role'          => $this->roleId,

        );
    }
}