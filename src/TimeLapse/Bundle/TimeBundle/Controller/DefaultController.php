<?php

namespace TimeLapse\Bundle\TimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	if($request->query->get("q") == "Quelle est ton adresse email ?")
    		return new Response('joris.favier@gmail.com');
    	else
    		return new Response("NON");
        //return $this->render('TimeLapseTimeBundle:Default:index.html.twig', array('name' => $name));
    }
}
