<?php

namespace Unoegohh\RetailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('UnoegohhAdminBundle:Page')->findOneBy(array('url' => 'index'));
        return $this->render('UnoegohhRetailBundle:Default:index.html.twig', array(
            'page' => $page,
        ));
    }
    public function feedbackAction()
    {
        return $this->render('UnoegohhRetailBundle:Default:feedback.html.twig');
    }
    public function galleryAction()
    {

        $em = $this->getDoctrine()->getManager();
        $gallery = $em->getRepository('UnoegohhAdminBundle:Photo')->findBy(array('enabled' => true));

        return $this->render('UnoegohhRetailBundle:Default:gallery.html.twig',array(
            'gallery'  => $gallery
        ));
    }
    public function staticAction($url)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('UnoegohhAdminBundle:Page')->findOneBy(array('url' => $url,'enabled' => true));

        return $this->render('UnoegohhRetailBundle:Default:index.html.twig', array(
            'page' => $page
        ));
    }


}
