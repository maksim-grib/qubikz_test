<?php

/**
 * Class TrainCard
 */
class TrainCard extends BoardingCard
{
    /**
     * Train
     * @var string
     */
    protected $train;

    /**
     * Seat
     * @var string|null
     */
    protected $seat;

    /**
     * @param string $origin
     * @param string $destination
     * @param $train
     * @param sting|null $seat
     */
    public function __construct($origin, $destination, $train, $seat = null)
    {
        parent::__construct($origin, $destination);
        $this->train = $train;
        $this->seat  = $seat;
    }

    /**
     * @inheritdoc
     */
    public function getCardInfo()
    {
        return sprintf('Take train %s from %s to %s.%s',
            $this->train,
            $this->origin,
            $this->destination,
            $this->seat ? sprintf(' Sit in seat %s.', $this->seat) : ' No seat assignment.'
        );
    }
}