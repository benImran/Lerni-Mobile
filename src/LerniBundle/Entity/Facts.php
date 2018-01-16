<?php

namespace LerniBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facts
 *
 * @ORM\Table(name="facts")
 * @ORM\Entity(repositoryClass="LerniBundle\Repository\FactsRepository")
 */
class Facts
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
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="interest", type="string", length=255)
     */
    private $interest;

    /**
     * @ORM\ManyToOne(targetEntity="LerniBundle\Entity\Countries", inversedBy="facts", cascade={"remove"})
     */
    private $country;

    /**
     * @ORM\ManyToMany(targetEntity="LerniBundle\Entity\Category", inversedBy="facts" ,  cascade={"persist"})
     */
    private $categories;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description.
     *
     * @param string|null $description
     *
     * @return Facts
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set interest.
     *
     * @param string $interest
     *
     * @return Facts
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;

        return $this;
    }

    /**
     * Get interest.
     *
     * @return string
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Set country.
     *
     * @param \LerniBundle\Entity\Countries|null $country
     *
     * @return Facts
     */
    public function setCountry(\LerniBundle\Entity\Countries $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return \LerniBundle\Entity\Countries|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add category.
     *
     * @param \LerniBundle\Entity\Category $category
     *
     * @return Facts
     */
    public function addCategory(\LerniBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category.
     *
     * @param \LerniBundle\Entity\Category $category
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCategory(\LerniBundle\Entity\Category $category)
    {
        return $this->categories->removeElement($category);
    }

    /**
     * Get categories.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
