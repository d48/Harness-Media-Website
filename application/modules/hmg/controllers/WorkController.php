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
            'FRY',
            'ECommerce',
            'Endecea',
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
            'title' => 'Nike/Hurley: USOPEN 2012'
        );

        // create duplicates and update name
        $oneill = $nike;
        $oneill['title'] = 'ONEILL';

        $tlfi = $nike;
        $tlfi['title'] = 'TLFI';

        $killerdana = $nike;
        $killerdana['title'] = 'KILLERDANA';

        $contiki = $nike;
        $contiki['title'] = 'CONTIKI';

        $fmf = $nike;
        $fmf['title'] = 'FMF';

        $skateboards = $nike;
        $skateboards['title'] = 'Skateboards';


        $this->view->data = array(
            $nike,
            $oneill,
            $tlfi,
            $killerdana,
            $contiki,
            $fmf,
            $skateboards
        );



        $this->view->thumbnailHTML = $this->buildThumbnails($this->view->data);
    }

}
