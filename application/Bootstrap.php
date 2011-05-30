<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }
    
    protected function _initAuth()
    {
        $this->bootstrap('session');
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $view = $this->getResource('view');
            $view->user = $auth->getIdentity();
        }
        return $auth;
    }

    protected function _initHelperPath() {
        $view = $this->bootstrap('view')->getResource('view');
        $view->setHelperPath(APPLICATION_PATH . '/views/helpers', 'My_View_Helper');
    }     
    
    protected function _initFlashMessenger()
    {
        /** @var $flashMessenger Zend_Controller_Action_Helper_FlashMessenger */
        $flashMessenger = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
        if ($flashMessenger->hasMessages()) {
            $view = $this->getResource('view');
            $view->messages = $flashMessenger->getMessages();
        }
    }
    
    public function _initAutoloader()
    {
        require_once APPLICATION_PATH . '/../library/Doctrine/Common/ClassLoader.php';

        $autoloader = \Zend_Loader_Autoloader::getInstance();

        $bisnaAutoloader = new \Doctrine\Common\ClassLoader('Bisna');
        $autoloader->pushAutoloader(array($bisnaAutoloader, 'loadClass'), 'Bisna');

        $appAutoloader = new \Doctrine\Common\ClassLoader('ZFStarter');
        $autoloader->pushAutoloader(array($appAutoloader, 'loadClass'), 'ZFStarter');
    }

    protected function _initAttributeExOpenIDPath() {
        $autoLoader = Zend_Loader_Autoloader::getInstance();

        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
                    'basePath' => APPLICATION_PATH,
                    'namespace' => 'My_',
                ));

        $resourceLoader->addResourceType('openidextension', 'openid/extension/', 'OpenId_Extension');
        $resourceLoader->addResourceType('authAdapter', 'auth/adapter', 'Auth_Adapter');

        $autoLoader->pushAutoloader($resourceLoader);
    }

     protected function _initAppKeysToRegistry() {

         $appkeys = new Zend_Config_Ini(APPLICATION_PATH . '/configs/appkeys.ini');
         Zend_Registry::set('keys', $appkeys);


     }

    /**
     * Do not call this _initLog
     * Load the logger into the registry for use
     *
     * Usage:
     * Zend_Registry::get('log')->info('sample message!');
     *
     *
     */
    protected function _initLogger()
    {
        if ($this->hasPluginResource('log')) {
            $r = $this->getPluginResource('log');
            $log = $r->getLog();
            Zend_Registry::set('log', $log);
        }
    }     
}
