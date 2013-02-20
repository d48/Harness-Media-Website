<?php

class HMG_WorkController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function buildThumbnails($wData) {
        // Zend_Debug::dump($wData);
        // exit;
        $output = '';

        echo print_r(array_keys($wData));
        exit;

        foreach($wData as $key) {
            foreach($key as $name) {
                echo $name;
                echo '</br>';
            }
            // $li = '<li><a href="#" data-key="' . $key . '">' . $key["title"] . '</a></li>';
            echo '</br>';
        }
        exit;

        return $output;
    }

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

        $oneill = $nike;
        $oneill['title'] = 'ONEILL';

        $tlfi = $nike;
        $tlfi['title'] = 'TLFI';

        $killerdana = $nike;
        $killerdana['title'] = 'KILLERDANA';

        $contiki = $nike;
        $contikie['title'] = 'CONTIKI';

        $fmf = $nike;
        $fmf['title'] = 'FMF';

        $skateboards = $nike;
        $skateboards['title'] = 'Skateboards';


        $this->view->data = array(
            'nike' => $nike,
            'oneill' => $oneill,
            'tlfi' => $tlfi,
            'killerdana' => $killerdana,
            'contiki' => $contiki,
            'fmf' => $fmf,
            'skateboards' => $skateboards,
        );

        $this->view->thumbnailHTML = $this->buildThumbnails($this->view->data);
    }

}
