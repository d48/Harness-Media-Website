<?php

class HMG_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        // $this->_helper->viewRenderer->setNoRender();
    }

    public function indexAction()
    {
        // action body

        $this->view->title = $this->_getParam('title','Harness Media Group');
        // $this->getResponse()
        //     ->appendBody('Hello ' . $name . ' from indexAction');

    }

    public function aboutAction()
    {
        // action body
        // $fc = Zend_Controller_Front::getInstance();

        // Zend_Debug::dump($fc->getRequest()->getControllerName());

        // $this->_forward(
        //     'index',
        //     'work',
        //     null, 
        //     array('url' => 'http://portfolio.hmg.com')
        // );
    }

    // public function __call($method, $args) {
    //     if('Action' == substr($method, -6)) {
    //         $this->_forward('index');
    //     }
    // }

}

