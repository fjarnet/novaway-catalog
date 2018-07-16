<?php

namespace Novaway\AdminBundle\Admin;

use Novaway\CommonBundle\Entity\Actor;
use Novaway\CommonBundle\Entity\Director;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class AbstractMovieAdmin
 *
 * @package Novaway\AdminBundle\Admin
 */
abstract class AbstractMovieAdmin extends AbstractAdmin
{

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('isan', TextType::class, [
            'label' => 'isan.label',
          ])
          ->add('title', TextType::class, [
            'label' => 'title.label',
          ])
          ->add('director', EntityType::class, [
            'class' => Director::class,
            'label' => 'director.label',
          ])
          ->add('actors', EntityType::class, [
            'class' => Actor::class,
            'multiple' => true,
            'label' => 'actors.label',
          ])
          ->add('date', DateType::class, [
            'widget' => 'single_text',
            'view_timezone' => 'Europe/Paris',
            'label' => 'date.label',
          ])
          ->add('duration', IntegerType::class, [
            'label' => 'duration.label',
          ])
          ->add('summary', TextareaType::class, [
            'required' => false,
            'label' => 'summary.label',
          ])
          ->add('price', MoneyType::class, [
            'label' => 'price.label',
          ])
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @throws \RuntimeException
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
          ->add('title')
          ->add('isan')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
          ->addIdentifier('title')
          ->add('isan')
          ->add('director')
          ->add('date')
        ;
    }
}