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
            $output .= '<li><a href="#" data-key="' . $key . '"><img src="img/work/' . $value["thumb"] . '" /></a></li>';
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

        $related = array(
            'Platform - Fry E-commerce',
            'Web Redesign',
            'Mobile/Tablet UI/UX',
            'Email Marketing',
            'Analytics - SiteCatalyst (Omniture)',
            'Search - Endeca, Lucene, Celebros',
            'Performance - Gomez, Akamai',
            'Personalization - Baynote, MyBuys',
            'Email Marketing - Lyris, iContact, Benchmark, CampaignMonitor, ExactTarget...',
            'Analytics - SiteCatalyst (Omniture), Google Analytics',
            'Social Marketing - Gorilla',
            'Mobile/Tablet',
            'Web UI/UX',
            'Mobile/iPad App',
            'Customized Social Experience'
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
            'description' => 'Provided Art direction and user experience (UI/UX) design for 2012 US OPEN of SURF. Deliverables included mobile app, web, customized social experience and targeted digital presence with key media outlets. Mobile event app drove an unexpected increase in numbers for crowd engagement sponsored by Hurley International.',
            'pictures' => $pictures,
            'services' => array(
                    $related[12],
                    $related[13],
                    $related[3],
                    $related[14]
                ), 
            'title' => 'NIKE US OPEN',
            'thumb' => 'hmg_tn_8020.jpg'
        );

        // create duplicates and update name
        $oneill = $nike;
        $oneill['title'] = 'ONEILL';
        $oneill['description'] = 'Provided creative direction for e-commerce, digital and ongoing marketing support to reach and grow overall user base. Drove primary engagement through email marketing and social channels. As the online business grew I collaborated with teams to develop in-store retail marketing strategy and launched community marketing programs for each storefront and outlet locations.';
        $oneill['thumb'] = 'hmg_tn_oneill.jpg';
        $oneill['services'] = array(
            $related[12],
            $related[13],
            $related[3],
            $related[14]
        );


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
        $rachelroy['description'] = 'Designed and managed creative, development/UAT/QA processes and presented to C and VP level executives for concepts and direction of web positioning. Produced multiple micro-sites, web-redesign(s), various digital campaigns, sought to implement digital/e-commerce best practices throughout each brand within the organization.';
        $rachelroy['services'] = array(
            $related[0],
            $related[1],
            $related[2],
            $related[3],
            $related[4]
        );
        $rachelroy['thumb'] = 'hmg_tn_8020.jpg';
        
        $jones= $nike;
        $jones['title'] = 'JONES NEW YORK'; 
        $jones['description'] = 'Provided Art Direction and Design to Jones New York for the launch of their microsite premiering their newest denim line for Fall2012 as well as their web presence for the launch of their Fall 2012 national ad campaign - Keeping up with the Jonses’.';
        $jones['services'] = array(
            $related[1],
            $related[3],
            $related[4]
        );
        $jones['thumb'] = 'hmg_tn_8020.jpg';
        
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
