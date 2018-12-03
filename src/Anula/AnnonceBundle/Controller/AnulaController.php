<?php

namespace Anula\AnnonceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AnulaController extends Controller
{
    public function indexAction()
    {
        return $this->render('AnulaAnnonceBundle:Default:index.html.twig');
    }

    public function addAction()
    {
        return $this->render('AnulaAnnonceBundle:Anula:add.html.twig');
    }

    public function viewAction($id)
    {
        $annonce = array(
            'title'   => 'Recherche développpeur Symfony2',
            'id'      => $id,
            'author'  => 'Alexandre',
            'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
            'date'    => new \Datetime()
        );

        return $this->render('AnulaAnnonceBundle:Anula:view.html.twig',
            array('annonce' => $annonce)
        );
    }
}
