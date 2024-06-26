<?php

namespace App\Form;

use App\Entity\Department;
use App\Entity\Employee;
use App\Entity\Position;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('otherName')
            ->add('lastName')
            ->add('engagementDate', DateType::class)
            ->add('employeeID', TextType::class, [
                'label' => 'Employee ID',
                'required' => false
            ])
            // ->add('profilePhoto')
            ->add('position', EntityType::class, [
                'class' => Position::class,
                'choice_label' => 'name',
                'choice_value' => 'id'
            ])
            ->add('department', EntityType::class, [
                'class' => Department::class,
                'choice_label' => 'name',
                'choice_value' => 'id'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
