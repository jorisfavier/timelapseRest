<?php

namespace TimeLapse\Bundle\TimeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 */
class Room
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $capacity;

    /**
     * @var boolean
     */
    private $projector;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Room
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return Room
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set projector
     *
     * @param boolean $projector
     * @return Room
     */
    public function setProjector($projector)
    {
        $this->projector = $projector;

        return $this;
    }

    /**
     * Get projector
     *
     * @return boolean 
     */
    public function getProjector()
    {
        return $this->projector;
    }
}
