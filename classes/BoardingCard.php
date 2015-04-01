<?php

/**
 * Class BoardingCard
 */
class BoardingCard
{
    /**
     * Origin
     * @var string
     */
    protected $origin;

    /**
     * Destination
     * @var string
     */
    protected $destination;

    /**
     * @param string $origin
     * @param string $destination
     */
    public function __construct($origin, $destination)
    {
        $this->origin = $origin;
        $this->destination = $destination;
    }

    /**
     * Get origin
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Get destination
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Casts to string representation
     * @return string
     */
    public function __toString()
    {
        return $this->getCardInfo();
    }

    /**
     * Get card info
     * @return string
     */
    protected function getCardInfo()
    {
        return sprintf('%s -> %s', $this->origin, $this->destination);
    }
}