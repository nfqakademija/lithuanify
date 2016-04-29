<?php

namespace LithuanifyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Created by PhpStorm.
 * User: deividas
 * Date: 4/30/16
 * Time: 1:35 AM
 */
class DatePick extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $today = (new \DateTime())->format('m/d/Y');
        $builder
            ->add('beginDate', 'date', [
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'attr' => [
                    'class' => 'form-inline form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'value' => $today,
                    'name' => 'start'
                ]
            ])
            ->add('endDate', 'date', [
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'attr' => [
                    'class' => 'form-inline form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'value' => $today,
                    'name' => 'end'
                ]
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LithuanifyBundle\Entity\DatePicker'
        ));
    }
}