<?php

namespace TimeLapse\Bundle\TimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View AS FOSView; 
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TimeLapse\Bundle\TimeBundle\Entity\Enonce;
use TimeLapse\Bundle\TimeBundle\Entity\Room;
use TimeLapse\Bundle\TimeBundle\Entity\Slot;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	if($request->query->get("q") == "Quelle est ton adresse email ?")
    		return new Response('joris.favier@gmail.com');
    	else if($request->query->get("q") == "Es-tu content de participer ? (OUI/NON)" || $request->query->get("q") == "Es-tu que tu as compris le principe du jeu ? (OUI/NON)" || $request->query->get("q") == "Es-tu pret a recevoir un enonce au format markdown par http post ? (OUI/NON)" || $request->query->get("q") == "As-tu bien recu le premier enonce ? (OUI/NON)" || $request->query->get("q") == "Bravo, je connais tes salles de cours maintenant, es-tu pret pour un nouvel ennonce ? (OUI/NON)" || $request->query->get("q") == "Bravo, je vois que tu modelise bien tes ressources en REST, es-tu pret pour un nouvel ennonce ? (OUI/NON)")
    		return new Response("OUI");
    	else
    		return new Response("NON");
        //return $this->render('TimeLapseTimeBundle:Default:index.html.twig', array('name' => $name));
    }

    public function enonceAction(Request $request, $id){
    	$logger = $this->get('logger');
        $logger->info($request->request->all());

        $res = new Response("NON");
        $res->setStatusCode(200);
        $enonce = new Enonce();
        $enonce->setContenu($request->getContent());
        $em = $this->getDoctrine()->getManager();
		$em->persist($enonce);
		$em->flush();
        return $res;
        
    }

    public function messageAction(Request $request){
    	$logger = $this->get('logger');
        $logger->info($request->request->all());

        $logger->error("testtoot");
        $res = new Response("NON");
        $res->setStatusCode(404);
        $enonce = new Enonce();
        $enonce->setContenu($request->getContent());
        $em = $this->getDoctrine()->getManager();
		$em->persist($enonce);
		$em->flush();
        return $res;
        
    }

    public function roomslotAction($id){
		$view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('TimeLapseTimeBundle:Slot');
        $res = $repo->findBy(array("room" => $id));
        $data = array();
        $data["description"] = "liste des slots";
        $links = array();
        foreach ($res as $slot) {
            $tmp = array('rel'=>"self","uri"=>$this->generateUrl('get_slot', array('id' => $slot->getId()), true));
            $links[] = array('id'=>$slot->getId(), 'links'=>$tmp);
        }
        $data["data"] = $links;
        $view->setStatusCode(200)->setData($data);
        return $view;    	


    }







}
