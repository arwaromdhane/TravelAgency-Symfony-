<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Circuit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Circuit controller.
 *
 */
class CircuitController extends Controller
{
    /**
     * Lists all circuit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $circuits = $em->getRepository('AdminBundle:Circuit')->findAll();

        return $this->render('circuit/index.html.twig', array(
            'circuits' => $circuits,
        ));
    }

    /**
     * Creates a new circuit entity.
     *
     */
    public function newAction(Request $request)
    {
        $circuit = new Circuit();
        $form = $this->createForm('AdminBundle\Form\CircuitType', $circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $circuit->getImage(); 
              // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            $circuit->setImage($fileName);



            $em = $this->getDoctrine()->getManager();
            $em->persist($circuit);
            $em->flush();

            return $this->redirectToRoute('circuit_show', array('id' => $circuit->getId()));
        }

        return $this->render('circuit/new.html.twig', array(
            'circuit' => $circuit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a circuit entity.
     *
     */
    public function showAction(Circuit $circuit)
    {
        $deleteForm = $this->createDeleteForm($circuit);

        return $this->render('circuit/show.html.twig', array(
            'circuit' => $circuit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing circuit entity.
     *
     */
    public function editAction(Request $request, $id)
    {
         $em = $this->getDoctrine()->getManager();
         $circuit = $em->getRepository('AdminBundle:Circuit')->find('3');

        $deleteForm = $this->createDeleteForm($circuit);
        $editForm = $this->createForm('AdminBundle\Form\CircuitType', $circuit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $circuit->getImage(); 
              // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            $circuit->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('circuit_index');
        }

        return $this->render('circuit/edit.html.twig', array(
            'circuit' => $circuit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a circuit entity.
     *
     */
    public function deleteAction(Request $request, Circuit $circuit)
    {
        $form = $this->createDeleteForm($circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($circuit);
            $em->flush();
        }

        return $this->redirectToRoute('circuit_index');
    }

    /**
     * Creates a form to delete a circuit entity.
     *
     * @param Circuit $circuit The circuit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Circuit $circuit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('circuit_delete', array('id' => $circuit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
