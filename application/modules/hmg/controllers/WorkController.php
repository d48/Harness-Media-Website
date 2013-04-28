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
            'Customized Social Experience',
            'Performance - Gomez',
            'Personalization - Baynote',
            'Email Marketing - Lyris',
            'Analytics - Google Analytics',
            'Search - Endeca',
            'Social - Wordpress, Gorilla'
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
            'thumb' => 'hmg_tn_usopen.jpg',
            'tech'  => $services
        );

        // create duplicates and update name
        $oneill = $nike;
        $oneill['title'] = 'ONEILL';
        $oneill['description'] = 'Provided creative direction for e-commerce, digital and ongoing marketing support to reach and grow overall user base. Drove primary engagement through email marketing and social channels. As the online business grew I collaborated with teams to develop in-store retail marketing strategy and launched community marketing programs for each storefront and outlet locations.';
        $oneill['thumb'] = 'hmg_tn_oneill.jpg';
        $oneill['services'] = array(
            $related[0],
            $related[15],
            $related[16],
            $related[17],
            $related[18]
        );


        $tlfi = $nike;
        $tlfi['title'] = 'TLFI';
        $tlfi['description'] = 'Provided Art Direction, E-commerce UI design, ongoing marketing support to reach overall business (sales and marketing) objectives. Collaborated and created marketing/promotions calendar and drove the majority of sales via email social marketing campaigns. ';
        $tlfi['thumb'] = 'hmg_tn_tlfi.jpg';
        $tlfi['services'] = array(
            $related[0],
            $related[15],
            $related[17],
            $related[18]
        );


        $killerdana = $nike;
        $killerdana['title'] = 'KILLER DANA';
        $killerdana['description'] = 'The redesign of the Killer Dana e-commerce website and introduction the overall digital/social media strategy was primarily hands role.  The design and management of our user experience, front-end web-development, allocation of production resources, site merchandising, affiliate marketing strategy, re-marketing management and all email marketing was a huge challenge in which our team approached with eyes wide open and produced a powerful shopping experience that was no less than innovative. Key product channels were selected and managed to direct users to destinations to convert. ';
        $killerdana['services'] = array(
            $related[0],
            $related[5],
            $related[6],
            $related[7],
            $related[8],
            $related[9],
            $related[10],
            $related[11]
        );



        $contiki = $nike;
        $contiki['title'] = 'CONTIKI';
        $contiki['description'] = 'Contiki is an exclusive travel agent/curator of 18-34 something vacations decided to launch an e-commerce extension of their brand that aligned with their 18-34 demographic. The site engaged users throughout the shopping experience by suggesting trips based on their location, search filters and item selections within the cart. Collections were also tailored for high-booking trips and cross-sold into each trip at different triggers throughout the site.';
        $contiki['services'] = array(
            $related[0],
            $related[19],
            $related[15],
            $related[7],
            $related[17],
            $related[9]
        );
        $contiki['thumb'] = 'hmg_tn_contiki.jpg';


        $fmf = $nike;
        $fmf['title'] = 'FMF';
        $fmf['description'] = 'Southern California is full of it. Dirt that is. Hence the existence of FMF, the original California aftermarket manufacturer for Moto and Off-road parts. Launching their new e-commerce site was a ride in itself. Learning everything about the Moto industry, parts, riding styles and more. Really good stuff. Site went off with a bang and ended with a hi-flying Best Trick show to launch the new site.';
        $fmf['services'] = array(
            $related[0],
            $related[5],
            $related[15],
            $related[7],
            $related[17],
            $related[9]
        );
        $fmf['thumb'] = 'hmg_tn_fmf.jpg';



        $skateboards = $nike;
        $skateboards['title'] = 'SKATEBOARDS';
        $skateboards['description'] = 'A première e-commerce destination for the skate industry we re-branded the entire business from the ground up. Adding our full blue chip commerce and digital package this site launched as a game changer compared to its competitors and gained traction within the 15-24 demographic.';
        $skateboards['services'] = array(
            $related[0],
            $related[5],
            $related[15],
            $related[16],
            $related[17],
            $related[20],
            $related[18]
        );
        $skateboards['thumb'] = 'hmg_tn_skate.jpg';


        
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
