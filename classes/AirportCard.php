<?php

/**
 * Class AirportCard
 */
class AirportCard extends BoardingCard
{
    /**
     * Flight
     * @var string
     */
    protected $flight;

    /**
     * Gate
     * @var string
     */
    protected $gate;

    /**
     * Seat
     * @var string
     */
    protected $seat;

    /**
     * Baggage
     * @var string
     */
    protected $baggage;

    /**
     * @param string $origin
     * @param string $destination
     * @param $flight
     * @param $gate
     * @param $seat
     * @param $baggage
     */
    public function __construct($origin, $destination, $flight, $gate, $seat, $baggage)
    {
        parent::__construct($origin, $destination);
        $this->flight = $flight;
        $this->gate = $gate;
        $this->seat = $seat;
        $this->baggage = $baggage;
    }

    /**
     * @inheritdoc
     */
    protected function getCardInfo()
    {
        return sprintf('From %s, take flight %s to %s. Gate %s, seat %s. %s.',
            $this->origin,
            $this->flight,
            $this->destination,
            $this->gate,
            $this->seat,
            $this->baggage
        );
    }
}