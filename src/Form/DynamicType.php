<?php


namespace App\Form;


use App\Entity\FilledField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DynamicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $filledFields = $builder->getData();

        /** @var FilledField $filledFiled */
        foreach ($filledFields as $filledFiled) {
            $field = $filledFiled->getField();
            $builder->add($field->getLabel(), $field->getWidgetForm()->getType(), [
                'mapped' => false,
                'data' => $filledFiled->getContent()
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'mapped' => false,
            'label' => false
        ]);
    }
}