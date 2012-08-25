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

        $date = new Zend_Date();
        $data = array(
            'hour' => $date->get(Zend_Date::HOUR),
            'min' => $date->get(Zend_Date::MINUTE),
            'sec' => $date->get(Zend_Date::SECOND)
        );

        $obj = new stdClass();
        $obj->day = $date->get(Zend_Date::DAY);
        $obj->month = $date->get(Zend_Date::MONTH);
        $obj->year= $date->get(Zend_Date::YEAR);

        $this->view->assign($data);
        $this->view->assign((array) $obj);
    }

    public function aboutAction()
    {
        // action body
        $this->getResponse()->appendBody('Hello from aboutAction mon');

        $this->_forward(
            'index',
            'work',
            null, 
            array('url' => 'http://portfolio.hmg.com')
        );
    }

    // public function __call($method, $args) {
    //     if('Action' == substr($method, -6)) {
    //         $this->_forward('index');
    //     }
    // }

}

