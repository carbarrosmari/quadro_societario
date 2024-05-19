<?php

namespace App\Form;

use App\Entity\Company;
use PhpParser\Builder\Enum_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nome Completo:'])
            ->add('cpf', TextType::class, ['label' => 'CPF:'])
            ->add('email', TextType::class, ['label' => 'E-mail:'])
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'corporateName',
                'label' => 'Empresa:',
            ])
            ->add('Salvar', SubmitType::class)
        ;
    }
}