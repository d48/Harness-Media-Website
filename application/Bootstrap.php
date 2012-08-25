<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public $frontController;

    protected function _initLocale() 
    {
        $locale = new Zend_Locale('en_US');
        Zend_Registry::set('Zend_Locale', $locale);
    }

    protected function _initViewSettings()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');

        // encoding and doctype
        $view->doctype('HTML5');
        $view->setEncoding('UTF-8');

        // meta
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
        $view->headMeta()->appendHttpEquiv('X-UA-Compatible', 'IE=edge,chrome=1');
        $view->headMeta()->appendHttpEquiv('Content-Language', 'en-US');
        $view->headMeta()->appendName('Author', 'www.harnessmedia.com');
        $view->headMeta()->appendName(
            'Subject', '
            Identity Design, 
            Branding, 
            High Quality Design, 
            Graphic Design, 
            Design, 
            Web Design, 
            Print Design, 
            Marketing, 
            Strategic Marketing'
        );
        $view->headMeta()->appendName(
            'Description', 
            'Harness Media Group - Building Brand Experiences. Identity Design, Branding, User Experience, e-commerce, ecommerce, Action Sports ecommerce, Usability, High Quality Design, Graphic Design, Design, Web Design, Print Design, Marketing, Strtegic Marketing.'
        );
        $view->headMeta()->appendName(
            'Keywords', 
            'Identity Design, 
             Branding, 
             User Experience, 
             e-commerce, 
             ecommerce, 
             Action Sports ecommerce, 
             Usability, 
             High Quality Design, 
             Graphic Design, 
             Design, 
             Web Design, 
             Print Design, 
             Marketing, 
             Strategic Marketing, 
             Jacin Greenhill, 
             DC, 
             District of Columbia, 
             Newport Beach, 
             California, 
             NYC, 
             New York City, 
             Virginia Beach, 
             VA Beach, 
             Alabama, 
             Sheffield'
        );
        $view->headMeta()->appendName(
            'viewport', 
            'width=device-width;initial-scale=1;maximum-scale=1'
        );

        // styles
        $view->headLink()->appendStylesheet('/css/base.css');
        $view->headLink()->appendStylesheet('/css/skeleton.css');
        $view->headLink()->appendStylesheet('/css/layout.css');
        $view->headLink()->appendStylesheet('/css/style.css');

        // title
        $view->headTitle('Harness Media Group - Building Brand Experiences');
        $view->headTitle()->setSeparator(' - ');

        // scripts
        $view->headScript()->appendFile(
            '/js/libs/modernizr-2.0.6.min.js',
            'text/javascript'
        );
    }

}

