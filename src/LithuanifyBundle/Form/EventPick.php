<?php
/**
 * Created by PhpStorm.
 * User: Rokas
 * Date: 05/05/16
 * Time: 22:58
 */

namespace LithuanifyBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventPick extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('event', EntityType::class, array(
                'label' => ' ',
                'class' => 'LithuanifyBundle:Event',
                'expanded' => false,
                'multiple' => false,
                'attr' => [
                    'class' => 'form-control input-sm pull-right'
                ]
        ))
            ->add('search', SubmitType::class, array(
                'label' => 'Rinktis', 
                'attr' => [
                    'class' => 'btn btn-primary btn-sm pull-left',
                ]
            ));
    }
}
