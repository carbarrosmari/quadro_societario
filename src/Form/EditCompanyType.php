<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EditCompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('corporateName', TextType::class, ['label' => 'Razão Social:'])
            ->add('cnpj', TextType::class, ['label' => 'CNPJ:'])
            ->add('phone', TextType::class, ['label' => 'Telefone:'])
            ->add('email', TextType::class, ['label' => 'E-mail:'])
            ->add('address', TextType::class, ['label' => 'Endereço:'])
            ->add('Atualizar', SubmitType::class)
        ;
    }
}