<?php

/**
 * Class BusCard
 */
class BusCard extends BoardingCard
{
    /**
     * Bus
     * @var string
     */
    protected $bus;

    /**
     * Seat
     * @var string|null
     */
    protected $seat;

    /**
     * @param string $origin
     * @param string $destination
     * @param $bus
     * @param string|null $seat
     */
    public function __construct($origin, $destination, $bus, $seat = null)
    {
        parent::__construct($origin, $destination);
        $this->bus = $bus;
        $this->seat  = $seat;
    }

    /**
     * @inheritdoc
     */
    protected function getCardInfo()
    {
        return sprintf('Take the %s bus from %s to %s.%s',
            $this->bus,
            $this->origin,
            $this->destination,
            $this->seat ? sprintf(' Sit in seat %s.', $this->seat) : ' No seat assignment.'
        );
    }
}