<?php
/**
 * User: shane
 * Date: 5/26/11
 * Time: 10:00 AM
 */

/**
 * Provides a base class that sets up the Doctrine and Doctrine Entity Manager objects.
 *
 */
namespace ZFStarter\Controller;

abstract class Action extends \Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     */
    protected $doctrine;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    public function __construct(\Zend_Controller_Request_Abstract $request, \Zend_Controller_Response_Abstract $response, array $invokeArgs = array())
    {
        $this->setRequest($request)
             ->setResponse($response)
             ->_setInvokeArgs($invokeArgs);
        $this->_helper = new \Zend_Controller_Action_HelperBroker($this);
        $this->doctrine = \Zend_Registry::get('doctrine');
        $this->entityManager = $this->doctrine->getEntityManager();
        $this->init();
    }

    public function getBootstrap()
    {
        if (null === $this->bootstrap) {
            $this->bootstrap = $this->getInvokeArg('bootstrap');
        }
        return $this->bootstrap;
    }
}
