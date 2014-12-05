<?php

namespace TimeLapse\Bundle\TimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View AS FOSView; 
use FOS\RestBundle\Controller\Annotations\View;

class MainRestController
{
     public function optionsTestsAction()
    {
    
    }

    
    /**
     * @View()
     */
    public function getTestsAction()
    {
        $view = FOSView::create();
        $test = array("toto"=> "test","titi"=>"tutu");
        $view->setStatusCode(200)->setData($test);
        return $view;
    } 

    public function newTestsAction()
    {} 

    public function postTestsAction()
    {}

}
