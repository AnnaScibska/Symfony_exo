<?php
/**
 * Created by PhpStorm.
 * User: annas
 * Date: 15/11/2018
 * Time: 17:27
 */

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class AdvertController extends Controller
{
    // Ne pas oublier de de mettre le suffixe Action derrière
    // le nom de la méthode
    public function indexAction()
    {
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig');
        return new Response($content);

//        //L'argument de l'objet Response est le contenu de la page
//        // que vous envoyez au visiteur
//        return new Response("Notre propre Hello World !");
    }

    public function byebyeAction()
    {
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:byebye.html.twig');
        return new Response($content);
    }

    public function viewAction($id) // url from view - relative & absolute
    {
        return new Response("Affichage de l'annonce d'id : ".$id);
    }

    public function viewBAction($id) // url from view - relative & absolute + parameter
    {
        $content = $this->get('templating')->render(
            'OCPlatformBundle:Advert:viewB.html.twig',
            array('advert_id' => $id)
        );
        return new Response($content);
    }

    public function view2Action($id) // url from controller - relative
    {
        // On veut avoir l'URL de l'annonce d'id $id.
        $url = $this->get('router')->generate(
            'oc_platform_view2', // 1er argument : le nom de la route
            array('id' => $id)   // 2e argument : les valeurs des paramètres
                                 // (optionnel si pas de paramètre)
        );

        // $url vaut « Symfony/web/app_dev.php/platform/advert/$id »
        return new Response("L'URL de l'annonce d'id $id est : ".$url);
    }

    public function view3Action($id) // url from controller - absolute
    {
        $url = $this->get('router')->generate(
            'oc_platform_view3', // 1er argument : le nom de la route
            array('id' => $id), // 2e argument : les valeurs des paramètres
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        // $url vaut « Symfony/web/app_dev.php/platform/advert/$id »
        return new Response("L'URL de l'annonce d'id $id est : ".$url);
    }

    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '$slug', créée en $year et au format $format."
        );
    }

    public function exo42Action($page) {
        $content = $this->get('templating')->render(
            'OCPlatformBundle:Advert:exo42.html.twig',
            array('page' => $page)
        );

        return new Response($content);
    }
}
