<?php

namespace Unoegohh\EstateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $estates = $em->getRepository('UnoegohhAdminBundle:Estate')->findAll();

        $categories = array();

        foreach($estates as  $estate){
            $categories[$estate->getCategory()->getTitle()][] = $estate;
        }


        return $this->render('UnoegohhEstateBundle:Default:index.html.twig', array('categories' => $categories,'estate_logo' =>true));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $estate = $em->getRepository('UnoegohhAdminBundle:Estate')->findOneBy(array('id' => $id));

        return $this->render('UnoegohhEstateBundle:Default:show.html.twig', array('estate' => $estate,'estate_logo' =>true));
    }
}
