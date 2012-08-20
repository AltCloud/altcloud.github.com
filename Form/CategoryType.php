<?php

namespace AltCloud\Instance3BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
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
