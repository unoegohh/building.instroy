<?php
namespace Unoegohh\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;


class PageAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Основоное')
                ->add('enabled', null, array('required' => false,'label' => 'Активна'))
                ->add('title', null, array('label' => 'Загаловок'))
                ->add('url', null, array('label' => 'Ссылка'))
                ->add('content', 'textarea', array(
                    'attr' => array(
                        'class' => 'tinymce',
                        'data-width' => '700',
                        'data-theme' => 'advanced' // simple, advanced, bbcode
                    ),
                    'label' => 'Контент'
                ))
            ->end()
            ->with('Меню',array('collapsed' => true))
                ->add('menu', null, array('required' => false,'label' => 'Показывать в верхнем меню'))
                ->add('footer_menu', null, array('required' => false,'label' => 'Показывать в футтере'))
                ->add('position', null, array('required' => false,'label' => 'Позиция в меню'))
            ->end()
            ->with('SEO',array('collapsed' => true))
                ->add('keywords', null, array('required' => false))
                ->add('description', null, array('required' => false))
            ->end()
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'Загаловок'))
            ->add('enabled', null, array('required' => false,'label' => 'Активна'))
            ->add('url', null, array('label' => 'Ссылка'))
            ->add('_action', 'actions', array(
            'actions' => array(
//                'view' => array(),
                'edit' => array(),
                'delete' => array(),
            )
        ))
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('enabled')
            ->add('url')
        ;
    }
}