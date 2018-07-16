<?php

namespace Novaway\AdminBundle\Admin;

use Novaway\CommonBundle\Entity\Author;
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
 * Class BookAdmin
 *
 * @package Novaway\AdminBundle\Admin
 */
class BookAdmin extends AbstractAdmin
{

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('isbn', TextType::class, [
            'label' => 'isbn.label',
          ])
          ->add('title', TextType::class, [
            'label' => 'title.label',
          ])
          ->add('author', EntityType::class, [
            'class' => Author::class,
            'label' => 'author.label',
          ])
          ->add('publishedAt', DateType::class, [
            'widget' => 'single_text',
            'view_timezone' => 'Europe/Paris',
            'label' => 'publishedAt.label',
          ])
          ->add('nbPages', IntegerType::class, [
            'label' => 'nbPages.label',
          ])
          ->add('summary', TextareaType::class, [
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
          ->add('isbn')
          ->add('author')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
          ->addIdentifier('title')
          ->add('isbn')
          ->add('author')
          ->add('publishedAt')
        ;
    }
}