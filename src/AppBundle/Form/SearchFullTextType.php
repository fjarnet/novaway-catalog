<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchFullTextType extends AbstractType
{

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array                                        $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->setMethod('GET')
          ->add('q', TextType::class, [
            'label' => 'search_form.q.label',
            'attr' => [
              'class' => 'form-control',
            ],
          ])
          ->add('submit', SubmitType::class, [
            'label' => 'search_form.submit.label',
            'attr' => [
              'class' => 'btn btn-primary',
            ],
          ])
        ;
    }
}