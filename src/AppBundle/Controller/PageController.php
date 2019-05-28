<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PageController extends Controller
{
    /**
     * @Route("/pages/{handle}", name="pages_show")
     */
    public function showAction($handle)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Page");
        $page = $repository->findOneBy(array('handle' => 'about'));

        return $this->render('pages/show.html.twig', array(
            'page' => $page
        ));
    }

}
