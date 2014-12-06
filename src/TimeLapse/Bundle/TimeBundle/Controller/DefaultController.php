<?php

namespace TimeLapse\Bundle\TimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TimeLapse\Bundle\TimeBundle\Entity\Enonce;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	if($request->query->get("q") == "Quelle est ton adresse email ?")
    		return new Response('joris.favier@gmail.com');
    	else if($request->query->get("q") == "Es-tu content de participer ? (OUI/NON)" || $request->query->get("q") == "Es-tu que tu as compris le principe du jeu ? (OUI/NON)" || $request->query->get("q") == "Es-tu pret a recevoir un enonce au format markdown par http post ? (OUI/NON)" || $request->query->get("q") == "As-tu bien recu le premier enonce ? (OUI/NON)")
    		return new Response("OUI");
    	else
    		return new Response("NON");
        //return $this->render('TimeLapseTimeBundle:Default:index.html.twig', array('name' => $name));
    }

    public function enonceAction(Request $request, $id){
    	$logger = $this->get('logger');
        $logger->info($request->request->all());

        $logger->error("testtoot");
        $res = new Response("NON");
        $res->setStatusCode(200);
        $enonce = new Enonce();
        $enonce->setContenu($request->getContent());
        $em = $this->getDoctrine()->getManager();
		$em->persist($enonce);
		$em->flush();
        return $res;
        
    }
}
