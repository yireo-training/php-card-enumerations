<?php

namespace App;

enum CardSuite: string
{
    case Hearts = 'Hearts';
    case Diamonds = 'Diamonds';
    case Clubs = 'Clubs';
    case Spades = 'Spades';

    public function getColor(): string
    {
        return match ($this) {
            CardSuite::Hearts, CardSuite::Diamonds => 'Red',
            CardSuite::Clubs, CardSuite::Spades => 'Black',
        };
    }

    public static function getSuites(): array
    {
        return array_column(CardSuite::cases(), 'name');
    }
}
