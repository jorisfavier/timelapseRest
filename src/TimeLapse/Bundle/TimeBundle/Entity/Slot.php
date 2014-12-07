<?php

namespace TimeLapse\Bundle\TimeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slot
 */
class Slot
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $room;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $start;

    /**
     * @var string
     */
    private $stop;


    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Slot
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set room
     *
     * @param string $room
     * @return Slot
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return string 
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Slot
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Slot
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
     * Set start
     *
     * @param string $start
     * @return Slot
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return string 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set stop
     *
     * @param string $stop
     * @return Slot
     */
    public function setStop($stop)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * Get stop
     *
     * @return string 
     */
    public function getStop()
    {
        return $this->stop;
    }
}
