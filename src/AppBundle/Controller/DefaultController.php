<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SportType;

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
        return $this->render('AppBundle:default:sports.html.twig', [
            'sports' => $sports
        ]);
    }
    public function showSportAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $sport = $em->getRepository('AppBundle:Sport')->find($id);
        return $this->render('AppBundle:default:showSport.html.twig', [
            'sport' => $sport
        ]);
    }
    public function addSportAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $sport = new Sport();
        $form = $this->createForm(SportType::class, $sport);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $sport = $form->getData();

            $em->persist($sport);
            $em->flush();

            return $this->redirectToRoute('sportshow', array(
                'id' => $sport->getId()
            ));
        }

        return $this->render('AppBundle:default:addSport.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function getJoueursAction()
    {
        $em = $this->getDoctrine()->getManager();
        $joueurs = $em->getRepository('AppBundle:Joueur')->findAll();
        return $this->render('AppBundle:default:joueurs.html.twig', [
            'joueurs' => $joueurs
        ]);
    }
    public function showJoueurAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $joueur = $em->getRepository('AppBundle:Joueur')->find($id);
        return $this->render('AppBundle:default:showJoueur.html.twig', [
            'joueur' => $joueur
        ]);
    }

    public function getClubsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clubs = $em->getRepository('AppBundle:Club')->findAll();
        return $this->render('AppBundle:default:clubs.html.twig', [
            'clubs' => $clubs
        ]);
    }
    public function showClubAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository('AppBundle:Club')->find($id);
        return $this->render('AppBundle:default:showClub.html.twig', [
            'club' => $club
        ]);
    }

}
