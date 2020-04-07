<?php

namespace App\Form;

use App\Entity\CallForProjects;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CallForProjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            ->add('fields', CollectionType::class, [
                'entry_type' => FieldsType::class,
                'label' => 'fields',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CallForProjects::class,
        ]);
    }
}
