<?php
/**
 * User: shane
 * Date: 5/25/11
 * Time: 6:15 AM
 */


class Application_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
    /**
     * The current logged in user
     * @var PRVideo\Entity\Person
     */
    protected $_currentUser;

    /**
     * Zend_Auth instance
     * @var Zend_Auth
     */
    protected $_auth;

    /**
     * Check that the controller/action the current user is trying to reach is allowed.  Redirect to either
     * login if not logged in or access denied if they are logged in.
     *
     * @param Zend_Controller_Request_Abstract $request
     * @return void
     */
    public function dispatchLoopStartup(\Zend_Controller_Request_Abstract $request)
    {

        $acl = $this->getAcl();
        $identity = $this->getCurrentUser();

        $resource = $request->getControllerName() . 'Controller';
        $privilege = $request->getActionName();

        $allowed = $acl->isAllowed($identity['role'], $resource, $privilege);


        // If they are not allowed, then send them somewhere else.
        if (!$allowed) {
            $controller = 'auth';
            /** @var $auth Zend_Auth */
            $auth = $this->getAuth();
            if (!$auth->hasIdentity()) {
                $action = 'login';
            } else {
                $action = 'permissions';
            }

            // Redirect.
            $r = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $r->gotoSimple($action, $controller);
        }
        
    }

    /**
     * Get the Acl object
     *
     * @return PRVideo\Acl
     */
    protected function getAcl()
    {
        $acl = new PRVideo\Acl();
        return $acl;
        
    }

    /**
     * Get the current logged in user
     *
     * @return PRVideo\Entity\Person
     */
    protected function getCurrentUser()
    {
        if (!$this->_currentUser) {
            $auth = $this->getAuth();
            if ($auth->hasIdentity()) {
                $this->_currentUser = $auth->getIdentity();
            } else {
            $this->_currentUser = array('role' => 'guest');
            }
        }
        return $this->_currentUser;
    }

    /**
     * Get the Zend_Auth instance
     * 
     * @return Zend_Auth
     */
    protected function getAuth()
    {
        if (!$this->_auth) {
            $this->_auth = Zend_Auth::getInstance();
        }
        return $this->_auth;

    }
    

}
