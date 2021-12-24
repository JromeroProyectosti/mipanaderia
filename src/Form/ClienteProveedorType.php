<?php

namespace App\Form;

use App\Entity\ClienteProveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rut')
            ->add('nombre')
            ->add('contacto')
            ->add('telefono')
            ->add('correo')
            ->add('tipoClienteProveedor')
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClienteProveedor::class,
        ]);
    }
}
