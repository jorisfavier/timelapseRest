<?php

namespace TimeLapse\Bundle\TimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View AS FOSView; 
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainRestController
{
     public function optionsTestsAction()
    {
    
    }

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

    /*public function optionsEnonceAction()
    {
        $view = FOSView::create();
        $view->setStatusCode(200);
        return $view;
    }

    
    public function getEnonceAction()
    {
        $view = FOSView::create();
        $test = array("toto"=> "test","titi"=>"tutu");
        $view->setStatusCode(404);
        return $view;
    } 

    public function postEnonceAction(Request $request)
    {
        $logger = $this->get('logger');
        $logger->info($request->request->all());
        $view = FOSView::create();
        $view->setStatusCode(404);
        return $view;
    }*/

}
