<?php

class WorkController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->viewRenderer->setNoRender();
    }

    public function indexAction()
    {
        // action body
        $this->getResponse()
            ->appendBody(
                'You can view my work at ' . $this->_getParam('url', '')
            );
    }


}

