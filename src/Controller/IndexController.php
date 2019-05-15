<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Page d'accueil
 *
 * @Route(path="/")
 */
class IndexController extends AbstractController
{
    /**
     * @Route(path="/", name="index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function afficherHomepage()
    {
        return $this->render('index.twig');
    }
}
// HeLlo Cc