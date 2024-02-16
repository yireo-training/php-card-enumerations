<?php declare(strict_types=1);

namespace App;

class Card
{
    public function __construct(
        private readonly CardSuite $cardSuite,
        private readonly CardRank $cardRank
    ) {
    }

    public function getName()
    {
        return $this->cardRank->name. ' of '.$this->cardSuite->name;
    }

    public function getColor()
    {
        return $this->cardSuite->getColor();
    }

    public function getRank()
{
    return $this->cardRank->getRank();
}
}
