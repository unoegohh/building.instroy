<?php
namespace Unoegohh\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

use Unoegohh\AdminBundle\Entity\Banner;
use Doctrine\ORM\EntityRepository;

class EstateAdmin extends Admin
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
                ->add('title',null,array('label' => 'Название'))
                ->add('category','sonata_type_model',array('label' => 'Категория'))
//                ->add('category',
//                    'entity',
//                    array(
//                        'empty_value' => null,
//                        'empty_data' => null,
//                        'label' => 'Категория',
//                        'class' => 'UnoegohhAdminBundle:EstateCategory',
//                        'query_builder' => function(EntityRepository $cat) {
//                            return $cat->createQueryBuilder('c');
//                        }
//                    ))
                ->add('descr','textarea',array('label' => 'Описание','attr' => array(
                    'class' => 'tinymce',
                    'data-width' => '700',
                    'data-theme' => 'advanced' // simple, advanced, bbcode
                    )))
                ->add('smallDesc',null,array('label' => 'Маленькое описание'))
                ->add('price',null,array('label' => 'Цена'))
                ->add('position',null,array('label' => 'Порядок'))
            ->end()
            ->with('Параметры',array('collapsed' => true))
                ->add('placement',
                'entity',
                array(
                    'label' => 'Город',
                    'empty_value' => null,
                    'empty_data' => null,
                    'class' => 'UnoegohhAdminBundle:EstateCity',
                    'query_builder' => function(EntityRepository $cat) {
                        return $cat->createQueryBuilder('c');
                    }
                ))
//                ->add('placement','sonata_type_model',array('label' => 'Жилая площадь'))
                ->add('square',null,array('label' => 'Жилая площадь'))
                ->add('floor',null,array('label' => 'Етаж'))
                ->add('beds',null,array('label' => 'Спальни'))
                ->add('furniture',null,array('label' => 'Меблировка'))
                ->add('type',null,array('label' => 'Предложение по типу'))
                ->add('garaj',null,array('label' => 'Гараж'))
            ->end()
            ->with('Растояния',array('collapsed' => true))
                ->add('plane',null,array('label' => 'до самлета', 'required' => false))
                ->add('bus',null,array('label' => 'до автобуса', 'required' => false))
                ->add('train',null,array('label' => 'до поезда', 'required' => false))
                ->add('road',null,array('label' => 'шоссе', 'required' => false))
                ->add('shop',null,array('label' => 'до магазина', 'required' => false))
                ->add('ski',null,array('label' => 'на лыжах', 'required' => false))
                ->add('beach',null,array('label' => 'пляж', 'required' => false))
            ->end()
            ->with('Медиа',array('collapsed' => true))
                ->add('map',null,array('label' => 'Карта', 'required' => false))
                ->add('video',null,array('label' => 'Видео', 'required' => false))
                ->add('photos','sonata_type_collection',array('label' => 'Фото', 'required' => false, 'by_reference' => false), array(
                    'edit' => 'inline',
                    'inline' => 'table'
                ))
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
            ->addIdentifier('title',null,array('label' => 'Название'))
            ->add('smallDesc',null,array('label' => 'Ссылка картинки'))
            ->add('_action', 'actions', array(
            'actions' => array(
//                'view' => array(),
                'edit' => array(),
                'delete' => array(),
            )
        ))
        ;
    }

}