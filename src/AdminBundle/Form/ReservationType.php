<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('dateDebut',null,['label'=>'Date Départ'])
        ->add('dateFin',null,['label'=>'Date Arrivée'])        
        ->add('nbpassager',null,['label'=>'Nombre personne'])
        ->add('typeCabinet',ChoiceType::class,
            [
            'choices'  => [
                'Chambre single' => 'Chambre single',
                'Chambre double' => 'Chambre double',
                'Chambre triple' => 'Chambre triple',
            ],
        ])
        ->add('typePension',ChoiceType::class,[
            'label'=>'Type Pension',
            'choices'  => [
                'Petit déjeuner' => 'Petit déjeuner',
                'Demi pension' => 'Demi pension',
                'Pension Complète' => 'Pension Complète',
                'Toute inclusive' => 'Toute inclusive',
            ],

        ])
        ->add('message',null,['label'=>'Message'])
        ->add('numtel',null,['label'=>'Num Tel.'])
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'adminbundle_reservation';
    }


}
