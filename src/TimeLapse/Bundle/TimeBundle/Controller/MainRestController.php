<?php

namespace TimeLapse\Bundle\TimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View AS FOSView; 
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TimeLapse\Bundle\TimeBundle\Entity\Enonce;
use TimeLapse\Bundle\TimeBundle\Entity\Room;


class MainRestController extends Controller
{
    public function optionsRoomsAction()
    {
        $view = FOSView::create();
        $view->setStatusCode(200);
        return $view;
    }

     public function optionsRoomAction()
    {
        $view = FOSView::create();
        $view->setStatusCode(200);
        return $view;
    }

    public function getRoomAction($id)
    {
        $view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('TimeLapseTimeBundle:Room');
        $res = $repo->findOneById($id);
        if(is_object($res))
            $view->setStatusCode(200)->setData($res);
        else
            $view->setStatusCode(404);
        return $view;
    } 

    public function postRoomAction()
    {

    }

    public function deleteRoomAction($id){

    }

    public function putRoomAction($id){

    }

    public function getRoomsAction(Request $request)
    {
        
        $view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('TimeLapseTimeBundle:Room');
        $res = $repo->findAll();
        $data = array();
        $data["description"] = "Salles d'ARTEM";
        $links = array();
        if($request->request->get("capacity")){
            foreach ($res as $room) {
                if($room->getCapacity() > $request->request->get("capacity")){
                    $tmp = array('rel'=>"self","uri"=>$this->generateUrl('get_room', array('id' => $room->getId()), true));
                    $links[] = array('id'=>$room->getId(), 'links'=>$tmp); 
                }
            }
            $data["data"] = $links;
            $view->setStatusCode(200)->setData($data);
            return $view;
        }
        else{
            $view->setStatusCode(400);
            return $view;
        }
        


    } 

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

    public function optionsSlotsAction()
    {
        $view = FOSView::create();
        $view->setStatusCode(200);
        return $view;
    }

     public function optionsSlotAction()
    {
        $view = FOSView::create();
        $view->setStatusCode(200);
        return $view;
    }

    public function getSlotAction($id)
    {
        $view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('TimeLapseTimeBundle:Room');
        $res = $repo->findOneById($id);
        if(is_object($res))
            $view->setStatusCode(200)->setData($res);
        else
            $view->setStatusCode(404);
        return $view;
    } 

    public function postSlotAction()
    {

    }

    public function deleteSlotAction($id){

    }

    public function putSlotAction($id){

    }

    public function getSlotsAction()
    {

        /*$view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('TimeLapseTimeBundle:Room');
        $res = $repo->findAll();
        $data = array();
        $data["description"] = "Salles d'ARTEM";
        $links = array();
        foreach ($res as $room) {
            $tmp = array('rel'=>"self","uri"=>$this->generateUrl('get_room', array('id' => $room->getId())));
            $links[] = array('id'=>$room->getId(), 'links'=>$tmp); 
        }
        $data["data"] = $links;
        $view->setStatusCode(200)->setData($data);
        return $view;*/


    }

}
