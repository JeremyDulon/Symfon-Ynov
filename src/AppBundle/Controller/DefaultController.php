<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function getSportsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sports = $em->getRepository('AppBundle:Sport')->findAll();
        return $this->render('AppBundle::sports.html.twig', [
            'sports' => $sports
        ]);
    }
    public function showSportAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $sport = $em->getRepository('AppBundle:Sport')->find($id);
        return $this->render('AppBundle::showSport.html.twig', [
            'sport' => $sport
        ]);
    }

    public function getJoueursAction()
    {
        $em = $this->getDoctrine()->getManager();
        $joueurs = $em->getRepository('AppBundle:Joueur')->findAll();
        return $this->render('AppBundle::joueurs.html.twig', [
            'joueurs' => $joueurs
        ]);
    }
    public function showJoueurAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $joueur = $em->getRepository('AppBundle:Joueur')->find($id);
        return $this->render('AppBundle::showJoueur.html.twig', [
            'joueur' => $joueur
        ]);
    }

    public function getClubsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clubs = $em->getRepository('AppBundle:Club')->findAll();
        return $this->render('AppBundle::clubs.html.twig', [
            'clubs' => $clubs
        ]);
    }
    public function showClubAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository('AppBundle:Club')->find($id);
        return $this->render('AppBundle::showClub.html.twig', [
            'club' => $club
        ]);
    }
}
