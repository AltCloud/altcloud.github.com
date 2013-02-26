<?php

namespace AltCloud\Instance3BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
        ;
    }

    public function getName()
    {
        return 'altcloud_instance3blogbundle_categorytype';
    }
}
