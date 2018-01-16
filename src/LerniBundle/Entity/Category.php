<?php

namespace LerniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="LerniBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=60, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=60, unique=true)
     */
    private $color;

    /**
     * @ORM\ManyToMany(targetEntity="LerniBundle\Entity\Facts", mappedBy="categories" , cascade={"persist"})
     */
    private $facts;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->facts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set color.
     *
     * @param string $color
     *
     * @return Category
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Add fact.
     *
     * @param \LerniBundle\Entity\Facts $fact
     *
     * @return Category
     */
    public function addFact(\LerniBundle\Entity\Facts $fact)
    {
        $this->facts[] = $fact;

        return $this;
    }

    /**
     * Remove fact.
     *
     * @param \LerniBundle\Entity\Facts $fact
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeFact(\LerniBundle\Entity\Facts $fact)
    {
        return $this->facts->removeElement($fact);
    }

    /**
     * Get facts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacts()
    {
        return $this->facts;
    }
}
