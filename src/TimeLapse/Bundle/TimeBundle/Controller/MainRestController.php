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
        if((($request->query->get("capacity") != null) && intval($request->query->get("capacity")) >0) || ($request->query->get("capacity")==null)){
            foreach ($res as $room) {
                if(intval($room->getCapacity()) > intval($request->query->get("capacity"))){
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
        $logger->info($request->query->all());
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
        $repo = $em->getRepository('TimeLapseTimeBundle:Slot');
        $res = $repo->findOneById($id);
        if(is_object($res))
            $view->setStatusCode(200)->setData($res);
        else
            $view->setStatusCode(404);
        return $view;
    } 

    public function postSlotAction(Request $request)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $view = FOSView::create();
        $slot = new Slot();
        $slot->setId($randomString);
        $slot->setRoom($request->request->get("room"));
        $slot->setTitle($request->request->get("title"));
        $slot->setDescription($request->request->get("description"));
        $slot->setStart($request->request->get("start"));
        $slot->setStop($request->request->get("stop"));
        $em = $this->getDoctrine()->getManager();
        $em->persist($slot);
        $em->flush();
        $view->setStatusCode(201);
        $view->setLocation($this->generateUrl('get_slot', array('id' => $slot->getId()), true));
        return $view;
    }

    public function deleteSlotAction($id){
        $view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('TimeLapseTimeBundle:Slot');
        $slot = $repo->findOneById($id);
        $em->remove($slot);
        $em->flush();
        $view->setStatusCode(200);
        return $view;
    }

    public function putSlotAction($id,Request $request){
        $view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('TimeLapseTimeBundle:Slot');
        $slot = $repo->findId($id);
        $slot->setRoom($request->request->get("room"));
        $slot->setTitle($request->request->get("title"));
        $slot->setDescription($request->request->get("description"));
        $slot->setStart($request->request->get("start"));
        $slot->setStop($request->request->get("stop"));
        $em->persist($slot);
        $em->flush();
        $view->setStatusCode(200)->setData("cool");
        return $view;
    }

    public function getSlotsAction(Request $request)
    {

        $view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('TimeLapseTimeBundle:Slot');
        $res = $repo->findAll();
        $data = array();
        $data["description"] = "liste des slots";
        $links = array();
        foreach ($res as $slot) {
            if(($request->query->get("room") != null && $request->query->get("room") == $slot->getRoom()) || $request->query->get("room") == null ){
                $tmp = array('rel'=>"self","uri"=>$this->generateUrl('get_slot', array('id' => $slot->getId()), true));
                $links[] = array('id'=>$slot->getId(), 'links'=>$tmp);
            }
        }
        $data["data"] = $links;
        $view->setStatusCode(200)->setData($data);
        return $view;


    }

    public function getFileAction($id){
        $view = FOSView::create();
        $ch = curl_init("http://timelapse-jayblanc.rhcloud.com/rest/players/jorisFavier/digest");

        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $result = curl_exec($ch);
        curl_close($ch);
        if($result == $id){
            $filename = "/Users/joris/Documents/RestWeb.zip";
            $response = new Response();

            // Set headers
            $response->headers->set('Cache-Control', 'private');
            $response->headers->set('Content-type', mime_content_type($filename));
            $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($filename) . '";');
            $response->headers->set('Content-length', filesize($filename));

            // Send headers before outputting anything
            $response->sendHeaders();

            $response->setContent(readfile($filename));
            return $response;
        }
        $view->setStatusCode(404);
        return $view;

    }

}
