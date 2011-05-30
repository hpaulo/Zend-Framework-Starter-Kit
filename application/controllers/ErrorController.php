<?php

class ErrorController extends Zend_Controller_Action
{

    public function errorAction()
    {
        // Disable ZFDebug plugin
        $frontController = Zend_Controller_Front::getInstance();
        $frontController->unregisterPlugin('ZFDebug_Controller_Plugin_Debug');

        // Ensure the default view suffix is used so we always return good
        // content
        $this->_helper->viewRenderer->setViewSuffix('phtml');

        // use shiny exception handler view, if configured as:
        // resources.frontController.errorview = shiny
        if ($this->getInvokeArg('errorview') && $this->getInvokeArg('errorview') != 'error') {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer($this->getInvokeArg('errorview'));
        }
        
        // Grab the error object from the request
        $errors = $this->_getParam('error_handler');

        // $errors will be an object set as a parameter of the request object,
        // type is a property
        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:

                // 404 error -- controller or action not found
                $this->getResponse()->setHttpResponseCode(404);
                $this->view->message = '404 Page not found';
                break;
            default:
                // application error
                $this->getResponse()->setHttpResponseCode(500);
                $this->view->message = '500 Application error';
                break;
        }

        // Log exception, if logger available
        if ($log = $this->getLog()) {
            $log->crit($this->view->message . ": " . $errors->exception, $errors->exception);
        }

        // pass the environment to the view script so we can conditionally
        // display more/less information
        #$this->view->env       = $this->getInvokeArg('env');
        $this->view->env = 'development';

        // pass the actual exception object to the view
        $this->view->exception = $errors->exception;

        // pass the request to the view
        $this->view->request   = $errors->request;
    }

    public function noaccessAction()
    {
        
    }

    public function getLog()
    {

        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->hasPluginResource('log')) {
            return false;
        }
        $log = $bootstrap->getResource('log');
        return $log;
    }


}

