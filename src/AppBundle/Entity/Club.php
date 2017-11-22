<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClubRepository")
 */
class Club
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25)
     */
    private $nom;

    /**
     * @var \AppBundle\Entity\Sport
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sport", inversedBy="clubs")
     */
    private $sport;

    /**
     * @var int
     *
     * @ORM\Column(name="nbTrophees", type="integer")
     */
    private $nbTrophees;

    /**
     * @var \AppBundle\Entity\Joueur
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Joueur", mappedBy="club", cascade={"remove", "persist"})
     */
    private $joueurs;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Club
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set sport
     *
     * @param string $sport
     *
     * @return Club
     */
    public function setSport($sport)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Get sport
     *
     * @return string
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set nbTrophees
     *
     * @param integer $nbTrophees
     *
     * @return Club
     */
    public function setNbTrophees($nbTrophees)
    {
        $this->nbTrophees = $nbTrophees;

        return $this;
    }

    /**
     * Get nbTrophees
     *
     * @return int
     */
    public function getNbTrophees()
    {
        return $this->nbTrophees;
    }

    /**
     * Set joueurs
     *
     * @param string $joueurs
     *
     * @return Club
     */
    public function setJoueurs($joueurs)
    {
        $this->joueurs = $joueurs;

        return $this;
    }

    /**
     * Get joueurs
     *
     * @return string
     */
    public function getJoueurs()
    {
        return $this->joueurs;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->joueurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add joueur
     *
     * @param \AppBundle\Entity\Joueur $joueur
     *
     * @return Club
     */
    public function addJoueur(\AppBundle\Entity\Joueur $joueur)
    {
        $this->joueurs[] = $joueur;

        return $this;
    }

    /**
     * Remove joueur
     *
     * @param \AppBundle\Entity\Joueur $joueur
     */
    public function removeJoueur(\AppBundle\Entity\Joueur $joueur)
    {
        $this->joueurs->removeElement($joueur);
    }
}
