<?php

namespace Unoegohh\RetailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function topMenuAction()
    {

        $success = false;
        $key = 'topMenu';
        $menu = apc_fetch($key, $success);

        if (!$success) {
            $em = $this->getDoctrine()->getManager();
            $menu = $em->getRepository('UnoegohhAdminBundle:Page')->findBy(array('enabled' => true,'menu' => true),array('position' => "ASC"));
            apc_store($key, $menu);
        }

        return $this->render('UnoegohhRetailBundle:Menu:topMenu.html.twig', array(
            'menu' => $menu,
        ));
    }

    public function footerMenuAction()
    {

        $success = false;
        $key = 'footerMenu';
        $footer_menu = apc_fetch($key, $success);

        if (!$success) {
            $em = $this->getDoctrine()->getManager();
            $footer_menu = $em->getRepository('UnoegohhAdminBundle:Page')->findBy(array('enabled' => true,'footer_menu' => true),array('position' => "ASC"));
            apc_store($key, $footer_menu);
        }

        return $this->render('UnoegohhRetailBundle:Menu:footerMenu.html.twig', array(
            'footer_menu' => $footer_menu,
        ));
    }
}
