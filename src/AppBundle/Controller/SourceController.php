<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SourceController extends Controller
{

    /**
     * @Route("/sources/{id}/{site_id}", requirements={"id" = "\d+", "site_id" = "\d+"}, name="sources_show")
     */
    public function showAction($id, $site_id)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Source");
        $source = $repository->find($id);

        $repository = $this->getDoctrine()->getRepository("AppBundle:Site");
        $site = $repository->find($site_id);


        return $this->render('sources/show.html.twig', array(
            'source' => $source,
            'site' => $site
        ));
    }

}
