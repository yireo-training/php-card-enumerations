<?php

namespace App;

enum CardRank: string
{
    case Two = 'Two';
    case Three = 'Three';
    case Four = 'Four';
    case Five = 'Five';
    case Six = 'Six';
    case Seven = 'Seven';
    case Eight = 'Eight';
    case Nine = 'Nine';
    case Ten = 'Ten';
    case Jack = 'Jack';
    case Queen = 'Queen';
    case King = 'King';
    case Ace = 'Ace';
    case Joker = 'Joker';

    public function getRank(): string
    {
        return $this->name;
    }

    public static function getRanks(): array
    {
        return array_column(CardRank::cases(), 'name');
    }
}
