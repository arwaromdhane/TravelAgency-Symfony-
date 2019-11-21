<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Hotel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Hotel controller.
 *
 */
class HotelController extends Controller
{
    /**
     * Lists all hotel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hotels = $em->getRepository('AdminBundle:Hotel')->findAll();

        return $this->render('hotel/index.html.twig', array(
            'hotels' => $hotels,
        ));
    }

    /**
     * Creates a new hotel entity.
     *
     */
    public function newAction(Request $request)
    {
        $hotel = new Hotel();
        $form = $this->createForm('AdminBundle\Form\HotelType', $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $hotel->getImage(); 
              // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            $hotel->setImage($fileName);

            $em->persist($hotel);
            $em->flush();

            return $this->redirectToRoute('hotel_show', array('id' => $hotel->getId()));
        }

        return $this->render('hotel/new.html.twig', array(
            'hotel' => $hotel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a hotel entity.
     *
     */
    public function showAction(Hotel $hotel)
    {
        $deleteForm = $this->createDeleteForm($hotel);

        return $this->render('hotel/show.html.twig', array(
            'hotel' => $hotel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hotel entity.
     *
     */
    public function editAction(Request $request, Hotel $hotel)
    {
        $deleteForm = $this->createDeleteForm($hotel);
        $editForm = $this->createForm('AdminBundle\Form\HotelType', $hotel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
             // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $hotel->getImage(); 
              // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            $hotel->setImage($fileName);
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hotel_edit', array('id' => $hotel->getId()));
        }

        return $this->render('hotel/edit.html.twig', array(
            'hotel' => $hotel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hotel entity.
     *
     */
    public function deleteAction(Request $request, Hotel $hotel)
    {
        $form = $this->createDeleteForm($hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hotel);
            $em->flush();
        }

        return $this->redirectToRoute('hotel_index');
    }

    /**
     * Creates a form to delete a hotel entity.
     *
     * @param Hotel $hotel The hotel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hotel $hotel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hotel_delete', array('id' => $hotel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
