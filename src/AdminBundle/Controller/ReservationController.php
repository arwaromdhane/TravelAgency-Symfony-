<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reservation controller.
 *
 */
class ReservationController extends Controller
{
     public function SupprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $reservation = $em->getRepository('AdminBundle:Reservation')->find($id);
        $hotel= $reservation->getHotel();
        $excursion= $reservation->getExcursion();

        $em->remove($reservation);
        $em->flush();
        if($hotel != null){
            return $this->redirectToRoute('reservation_hotel_index');

        }
        return $this->redirectToRoute('reservation_excursion_index');
        

    }
    
    public function AccepterAction($id, Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        $type = $request->query->get('type');


        $reservation = $em->getRepository('AdminBundle:Reservation')->find($id);
        $reservation->setEtat('accepté');
        $em->flush();
        if($type == "hotel"){
            return $this->redirectToRoute('reservation_hotel_index');
        }
        return $this->redirectToRoute('reservation_excursion_index');
        
 
    }

    public function RefuserAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $type = $request->query->get('type');

        $reservation = $em->getRepository('AdminBundle:Reservation')->find($id);
        $reservation->setEtat('refusé');
        $em->flush();
        if($type == 'hotel'){
            return $this->redirectToRoute('reservation_hotel_index');
        }
        if($type == 'excursion'){
            return $this->redirectToRoute('reservation_excursion_index');
        }

    }

    public function mesReservationsAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('AdminBundle:Reservation')->findAll();

        return $this->render('reservation/mesreservations.html.twig', array(
            'reservations' => $reservations,
        ));
    }
    /**
     * Lists all reservation entities.
     *
     */
    public function HotelAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('AdminBundle:Reservation')->findAll();

        return $this->render('reservation/index_hotel.html.twig', array(
            'reservations' => $reservations,
        ));
    }

     /**
     * Lists all reservation entities.
     *
     */
    public function ExcursionAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('AdminBundle:Reservation')->findAll();

        return $this->render('reservation/index_excursion.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Creates a new reservation entity.
     *
     */
    public function newAction(Request $request, $id,$type)
    {
        if( $this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') ){
            // authenticated (NON anonymous)
             $reservation = new Reservation();
            $form = $this->createForm('AdminBundle\Form\ReservationType', $reservation);
            $form->handleRequest($request);
            $hotel =null;
            $excursion =null;

            if($type== "hotel"){
                $em = $this->getDoctrine()->getManager();
                $hotel = $em->getRepository('AdminBundle:Hotel')->find($id);
                $reservation->setHotel($hotel);
            }

            if($type== "excursion"){
                $em = $this->getDoctrine()->getManager();
                $excursion = $em->getRepository('AdminBundle:Excursion')->find($id);
                $reservation->setExcursion($excursion);
            }


            if ($form->isSubmitted()) {
                var_dump($id, $type);
                $reservation->setUser($this->getUser());
                $reservation->setDatereservation(new \DateTime());
               
                $reservation->setEtat('en attente');
                $em = $this->getDoctrine()->getManager();
                $em->persist($reservation);
                $em->flush();

                $flashbag = $this->get('session')->getFlashBag();
                $message="Réservation envoyée avec succée !";
                $flashbag->add("success", $message);
                
                //return $this->redirectToRoute('frontend_homepage');
                //mesReservations
                return $this->redirectToRoute('mesReservations', array('id'=>$this->getUser()->getId()));

            }

            return $this->render('reservation/new.html.twig', array(
                'reservation' => $reservation,
                'form' => $form->createView(),
                'type'=> $type ,
                'hotel'=>$hotel,
                'excursion'=>$excursion
             ));
        }
        return $this->redirectToRoute('fos_user_security_login');

       
    }

    /**
     * Finds and displays a reservation entity.
     *
     */
    public function showAction(Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('reservation/show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservation entity.
     *
     */
    public function editAction(Request $request, Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('AdminBundle\Form\ReservationType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_edit', array('id' => $reservation->getId()));
        }

        return $this->render('reservation/edit.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservation entity.
     *
     */
    public function deleteAction(Request $request, Reservation $reservation)
    {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush();
        }

        return $this->redirectToRoute('reservation_index');
    }

    /**
     * Creates a form to delete a reservation entity.
     *
     * @param Reservation $reservation The reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
