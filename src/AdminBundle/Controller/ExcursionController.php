<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Excursion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Excursion controller.
 *
 */
class ExcursionController extends Controller
{
    /**
     * Lists all excursion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $excursions = $em->getRepository('AdminBundle:Excursion')->findAll();

        return $this->render('excursion/index.html.twig', array(
            'excursions' => $excursions,
        ));
    }

    /**
     * Creates a new excursion entity.
     *
     */
    public function newAction(Request $request)
    {
        $excursion = new Excursion();
        $form = $this->createForm('AdminBundle\Form\ExcursionType', $excursion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $excursion->getImage(); 
              // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            $excursion->setImage($fileName);


            $em->persist($excursion);
            $em->flush();

            return $this->redirectToRoute('excursion_index');
        }

        return $this->render('excursion/new.html.twig', array(
            'excursion' => $excursion,
            'form' => $form->createView(),
        ));
    }
 

    /**
     * Displays a form to edit an existing excursion entity.
     *
     */
    public function editAction(Request $request, Excursion $excursion)
    {
        $deleteForm = $this->createDeleteForm($excursion);
        $editForm = $this->createForm('AdminBundle\Form\ExcursionType', $excursion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $excursion->getImage(); 
              // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            $excursion->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('excursion_index');
        }

        return $this->render('excursion/edit.html.twig', array(
            'excursion' => $excursion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a excursion entity.
     *
     */
    public function deleteAction(Request $request, Excursion $excursion)
    {
        $form = $this->createDeleteForm($excursion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($excursion);
            $em->flush();
        }

        return $this->redirectToRoute('excursion_index');
    }

    /**
     * Creates a form to delete a excursion entity.
     *
     * @param Excursion $excursion The excursion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Excursion $excursion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('excursion_delete', array('id' => $excursion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
