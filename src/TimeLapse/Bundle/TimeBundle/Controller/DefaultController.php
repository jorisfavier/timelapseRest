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
    	else if($request->query->get("q") == "Es-tu content de participer ? (OUI/NON)" || $request->query->get("q") == "Es-tu que tu as compris le principe du jeu ? (OUI/NON)" || $request->query->get("q") == "Es-tu pret a recevoir un enonce au format markdown par http post ?  (OUI/NON)")
    		return new Response("OUI");
    	else
    		return new Response("NON");
        //return $this->render('TimeLapseTimeBundle:Default:index.html.twig', array('name' => $name));
    }
}
