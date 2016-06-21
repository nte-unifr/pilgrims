<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SiteController extends Controller
{
    /**
     * @Route("/", name="sites_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Site");
        $sites = $repository->findAll();

        return $this->render('sites/index.html.twig', array(
            'sites' => $sites
        ));
    }

    /**
     * @Route("/sites/{id}", requirements={"id" = "\d+"}, name="sites_show")
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Site");
        $site = $repository->find($id);
        $uu = $_SERVER['REMOTE_USER'];

        return $this->render('sites/show.html.twig', array(
            'site' => $site,
            'uu' => $uu
        ));
    }

}
