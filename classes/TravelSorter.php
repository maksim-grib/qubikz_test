<?php

/**
 * Class TravelSorter
 */
class TravelSorter implements Iterator
{
    /**
     * Cards hash map
     * @var array
     */
    protected $cards = array();

    /**
     * Cards hash map by origin
     * @var array
     */
    protected $cardsByOrigin = array();

    /**
     * Cards hash map by destination
     * @var array
     */
    protected $cardsByDestination = array();

    /**
     * Starting point
     * @var string|null
     */
    protected $startingPoint = null;

    /**
     * Iterator position
     * @var string
     */
    private $position;

    /**
     * Iterator key
     * @var int
     */
    private $key;

    /**
     * Add boarding card
     * @param BoardingCard $card
     */
    public function addCard(BoardingCard $card)
    {
        $hash = spl_object_hash($card);

        $this->cards[$hash] = $card;

        $this->cardsByOrigin[$card->getOrigin()] = $hash;
        $this->cardsByDestination[$card->getDestination()] = $hash;

        $this->startingPoint = null;
    }

    /**
     * Add multiple boarding cards
     * @param array $cards
     */
    public function addCards(array $cards)
    {
        foreach ($cards as $card) {
            $this->addCard($card);
        }
    }

    /**
     * Get starting point
     * @return mixed|null
     */
    private function getStartingPoint()
    {
        if (null === $this->startingPoint) {
            $point = key($this->cardsByDestination);
            while (array_key_exists($point, $this->cardsByDestination)) {
                $hash = $this->cardsByDestination[$point];

                /** @var BoardingCard $card */
                $card = $this->cards[$hash];
                $point = $card->getOrigin();
            }

            $this->startingPoint = $point;
        }

        return $this->startingPoint;
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->position = $this->getStartingPoint();
        $this->key = 0;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        $hash = $this->cardsByOrigin[$this->position];

        return $this->cards[$hash];
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        $hash = $this->cardsByOrigin[$this->position];
        $card = $this->position = $this->cards[$hash];
        $this->position = $card->getDestination();
        $this->key++;
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return array_key_exists($this->position, $this->cardsByOrigin);
    }
}