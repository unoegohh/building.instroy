<?php
namespace Unoegohh\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

use Unoegohh\AdminBundle\Entity\Banner;

class PhotoAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Основное')
            ->add('enabled', null, array('required' => false, 'label' => 'Включен'))
            ->add('title', null, array('label' => 'Название'))
            ->add('url', null, array('label' => 'Ссылка на картинку'))
            ->add('position', null, array('label' => 'Позиция'))
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
            ->addIdentifier('title', null, array('label' => 'Название'))
            ->add('enabled', null, array('label' => 'Включен'))
            ->add('position', null, array('label' => 'Позиция'))
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
            ->add('position')
        ;
    }
}