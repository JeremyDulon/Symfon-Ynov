<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sport
 *
 * @ORM\Table(name="sport")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SportRepository")
 */
class Sport
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
     * @ORM\Column(name="libelle", type="string", length=25)
     */
    private $libelle;

    /**
     * @var \AppBundle\Entity\Club
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Club", mappedBy="sport", cascade={"remove", "persist"})
     */
    private $clubs;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Sport
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set clubs
     *
     * @param string $clubs
     *
     * @return Sport
     */
    public function setClubs($clubs)
    {
        $this->clubs = $clubs;

        return $this;
    }

    /**
     * Get clubs
     *
     * @return string
     */
    public function getClubs()
    {
        return $this->clubs;
    }
}

