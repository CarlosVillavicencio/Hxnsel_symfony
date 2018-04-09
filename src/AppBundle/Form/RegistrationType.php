<?php

// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name', null, array('label' => 'form.first_name', 'translation_domain' => 'FOSUserBundle'));
        $builder->add('last_name', null, array('label' => 'form.last_name', 'translation_domain' => 'FOSUserBundle'));
    }

    public function getParent()

    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}