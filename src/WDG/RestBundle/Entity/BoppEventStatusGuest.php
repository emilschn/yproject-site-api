<?php

namespace WDG\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\BoppEventStatusGuest
 *
 * @ORM\Entity(repositoryClass="BoppEventStatusGuestRepository")
 * @ORM\Table(name="bopp_event_status_guest", indexes={@ORM\Index(name="fk_bopp_event_has_bopp_user_bopp_user1_idx", columns={"bopp_user_id"}), @ORM\Index(name="fk_bopp_event_has_bopp_user_bopp_event1_idx", columns={"bopp_event_id"})})
 */
class BoppEventStatusGuest
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $bopp_event_id;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $bopp_user_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $event_guest_status;

    /**
     * @ORM\ManyToOne(targetEntity="BoppEvent", inversedBy="boppEventStatusGuests")
     * @ORM\JoinColumn(name="bopp_event_id", referencedColumnName="id")
     */
    protected $boppEvent;

    /**
     * @ORM\ManyToOne(targetEntity="BoppUser", inversedBy="boppEventStatusGuests")
     * @ORM\JoinColumn(name="bopp_user_id", referencedColumnName="id")
     */
    protected $boppUser;

    public function __construct()
    {
    }

    /**
     * Set the value of bopp_event_id.
     *
     * @param integer $bopp_event_id
     * @return \Entity\BoppEventStatusGuest
     */
    public function setBoppEventId($bopp_event_id)
    {
        $this->bopp_event_id = $bopp_event_id;

        return $this;
    }

    /**
     * Get the value of bopp_event_id.
     *
     * @return integer
     */
    public function getBoppEventId()
    {
        return $this->bopp_event_id;
    }

    /**
     * Set the value of bopp_user_id.
     *
     * @param integer $bopp_user_id
     * @return \Entity\BoppEventStatusGuest
     */
    public function setBoppUserId($bopp_user_id)
    {
        $this->bopp_user_id = $bopp_user_id;

        return $this;
    }

    /**
     * Get the value of bopp_user_id.
     *
     * @return integer
     */
    public function getBoppUserId()
    {
        return $this->bopp_user_id;
    }

    /**
     * Set the value of event_guest_status.
     *
     * @param integer $event_guest_status
     * @return \Entity\BoppEventStatusGuest
     */
    public function setEventGuestStatus($event_guest_status)
    {
        $this->event_guest_status = $event_guest_status;

        return $this;
    }

    /**
     * Get the value of event_guest_status.
     *
     * @return integer
     */
    public function getEventGuestStatus()
    {
        return $this->event_guest_status;
    }

    /**
     * Set BoppEvent entity (many to one).
     *
     * @param \Entity\BoppEvent $boppEvent
     * @return \Entity\BoppEventStatusGuest
     */
    public function setBoppEvent(BoppEvent $boppEvent = null)
    {
        $this->boppEvent = $boppEvent;

        return $this;
    }

    /**
     * Get BoppEvent entity (many to one).
     *
     * @return \Entity\BoppEvent
     */
    public function getBoppEvent()
    {
        return $this->boppEvent;
    }

    /**
     * Set BoppUser entity (many to one).
     *
     * @param \Entity\BoppUser $boppUser
     * @return \Entity\BoppEventStatusGuest
     */
    public function setBoppUser(BoppUser $boppUser = null)
    {
        $this->boppUser = $boppUser;

        return $this;
    }

    /**
     * Get BoppUser entity (many to one).
     *
     * @return \Entity\BoppUser
     */
    public function getBoppUser()
    {
        return $this->boppUser;
    }

    public function __sleep()
    {
        return array('bopp_event_id', 'bopp_user_id', 'event_guest_status');
    }
}