<?php

class HMG_WorkController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    /**
     * Create HTML for thumbnails on work page and their data attribute
     * @name buildThumbnails 
     * 
     * @param {Object} $wData - Array of data to use
     * @access public
     * @return {String} $output - HTML for list elements
     */
    public function buildThumbnails($wData) {
        $output = '';

        foreach($wData as $key => $value) {
            $output .= '<li><a href="#" data-key="' . $key . '">' . $value["title"] . '</a></li>';
        }

        return $output;
    }

    /**
     * Set up default data 
     * @name indexAction 
     * 
     * @access public
     * @return void - Creates view variables for display and js click handling
     * @todo setup database store for site data
     */
    public function indexAction()
    {
        $description = 'Short description goes here and hello be very descriptive of the overall project. Two to 3 sentences max.';

        $pictures = array(
            'img/work-fpo-pictures.png',
            'img/work-fpo-pictures.png',
            'img/work-fpo-pictures.png',
            'img/work-fpo-pictures.png',
            'img/work-fpo-pictures.png',
            'img/work-fpo-pictures.png'
        );

        $services = array(
            'FRY E-commerce',
            'Endeca',
            'Scene7',
            'Gomez',
            'WordPress',
            'Omniture/SiteCatalyst',
            'Google Analytics'
        );
        
        $nike = array(
            'description' => $description,
            'pictures' => $pictures,
            'services' => $services,
            'title' => 'NIKE US OPEN'
        );

        // create duplicates and update name
        $oneill = $nike;
        $oneill['title'] = 'ONEILL';

        $tlfi = $nike;
        $tlfi['title'] = 'TLFI';

        $killerdana = $nike;
        $killerdana['title'] = 'KILLER DANA';

        $contiki = $nike;
        $contiki['title'] = 'CONTIKI';

        $fmf = $nike;
        $fmf['title'] = 'FMF';

        $skateboards = $nike;
        $skateboards['title'] = 'SKATEBOARDS';

        $rachelroy = $nike;
        $rachelroy['title'] = 'RACHEL ROY'; 
        
        $jones= $nike;
        $jones['title'] = 'JONES NEW YORK'; 

        $this->view->data = array(
            $rachelroy,
            $jones,
            $nike,
            $killerdana,
            $fmf,
            $contiki,
            $oneill,
            $skateboards,
            $tlfi
        );



        $this->view->thumbnailHTML = $this->buildThumbnails($this->view->data);
    }

}
