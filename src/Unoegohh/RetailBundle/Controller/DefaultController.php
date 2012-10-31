<?php

namespace Unoegohh\RetailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Unoegohh\RetailBundle\Entity\Feedback;
use Symfony\Component\HttpFoundation\Request;

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
    public function feedbackAction(Request $request)
    {
        // just setup a fresh $task object (remove the dummy data)
        $feedback = new Feedback();

        $form = $this->createFormBuilder($feedback)
            ->add('theme', 'text', array('label' => 'Тема'))
            ->add('context', 'textarea', array('label' => 'Сообщение'))
            ->add('name', 'text', array('label' => 'Ваше ФИО'))
            ->add('contacts', 'text', array('label' => 'Как с вами связаться'))
            ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($feedback);
                    $em->flush();

                    $message = $this->get('mailer')->createMessage()
                        ->setSubject($feedback->getTheme())
                        ->setFrom(array($this->container->getParameter('mail_from') => $this->container->getParameter('mail_name')))
                        ->setBody($this->renderView('UnoegohhRetailBundle:Default:mail.html.twig', array('feedback' => $feedback)), 'text/html')
                        ->addTo($this->container->getParameter('mail_to'));

                    $this->get('mailer')->send($message);

                    return $this->redirect($this->generateUrl('feedback_ok'));
                }
            }
        }
        return $this->render('UnoegohhRetailBundle:Default:feedback.html.twig' , array(
            'form' => $form->createView(),
        ));
    }
    public function galleryAction()
    {

        $em = $this->getDoctrine()->getManager();

        $gallery = $em->getRepository('UnoegohhAdminBundle:Photo')->findBy(array('enabled' => true),array('position' => "ASC"));

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
