<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function ContactAction( )
    {          
        return $this->render('contact/contact.html.twig');
    }
    public function sendMailAction( )
    {  
        $msg ="hooooooooo";
        $message = \Swift_Message::newInstance()
                ->setSubject("destino")
                ->setFrom("destinoarn@gmail.com")
                ->setTo("arwa.romdhan@gmail.com")
                ->setBody("<h1>$msg,<br/> Envoyé par :</h1>", 'text/html');
        if($this->get('mailer')->send($message)){
            $flashbag = $this->get('session')->getFlashBag();
            $message="Votre Email est envoyé avec succée !";
            $flashbag->add("success", $message);
        } 


        return $this->render('contact/contact.html.twig');
    }
    public function SearchAction(Request $request)
    { 
        $destination = $request->query->get('destination');
        $type = $request->query->get('adventure');
        $maxPrix = $request->query->get('maxPrix');
        
        $em = $this->getDoctrine()->getManager();

        if($type == "Hotels"){
            $hotels = $em->getRepository('AdminBundle:Hotel')->findBy(array('ville'=>$destination));
            return $this->render('hotel/offres_Hotels.html.twig', array(
            'hotels' => $hotels,
            'destination' => $destination,
            'type'=> $type,
            'maxPrix' =>$maxPrix
            ));
        }

         if($type == "Rondonnées"){
            $excursions = $em->getRepository('AdminBundle:Excursion')->findBy(array('lieuArrive'=>$destination));
            return $this->render('excursion/offres_Excursions.html.twig', array(
            'excursions' => $excursions,
            'destination' => $destination,
            'type'=> $type,
            'maxPrix' =>$maxPrix
            ));
        } 
        return $this->render('@Frontend/Default/index.html.twig');
    }


    public function indexAction()
    {
        return $this->render('@Frontend/Default/index.html.twig');
    }

    public function offres_ExcursionsAction()
    {
       
        $em = $this->getDoctrine()->getManager();
        $excursions = $em->getRepository('AdminBundle:Excursion')->findAll();

        return $this->render('excursion/offres_Excursions.html.twig', array(
            'excursions' => $excursions,
            'maxPrix' =>'0'
        ));
    }

    public function offres_HotelsAction()
    {
       
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('AdminBundle:Hotel')->findAll();

        return $this->render('hotel/offres_Hotels.html.twig', array(
            'hotels' => $hotels,
            'destination' => null,
            'type'=> null,
            'maxPrix' =>'0'
        ));
    }
    
    public function reserverAction($id)
    {
       
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('AdminBundle:Hotel')->findAll();

        return $this->render('hotel/offres_Hotels.html.twig', array(
            'hotels' => $hotels,
        ));
    }
}
