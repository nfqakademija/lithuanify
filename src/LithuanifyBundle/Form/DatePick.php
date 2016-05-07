<?php

namespace LithuanifyBundle\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
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

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'attr' => [
                    'class' => 'form-inline form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'name' => 'start',
                ],
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'attr' => [
                    'class' => 'form-inline form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'name' => 'end',
                ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LithuanifyBundle\Entity\DatePicker',
            'allow_extra_fields' => true,
        ));
    }
}
