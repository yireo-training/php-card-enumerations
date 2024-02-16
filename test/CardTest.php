<?php declare(strict_types=1);

namespace App\Test;

use App\CardRank;
use App\CardSuite;
use App\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testEnumerations()
    {
        $this->assertEquals('Red', CardSuite::Diamonds->getColor());
        $this->assertEquals('Black', CardSuite::Spades->getColor());
        $this->assertEquals('Joker', CardRank::Joker->getRank());
    }

    /**
     * @test
     * @return void
     */
    public function testCard()
    {
        $card = new Card(CardSuite::Clubs, CardRank::Ace);
        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals('Black', $card->getColor());
        $this->assertEquals('Ace', $card->getRank());
        $this->assertEquals('Ace of Clubs', $card->getName());

        $card = new Card(CardSuite::Hearts, CardRank::Eight);
        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals('Red', $card->getColor());
    }

    public function testCardDeck()
    {
        $cards = [];
        foreach(CardSuite::getSuites() as $suite) {
            foreach(CardRank::getRanks() as $rank) {
                $cards[] = new Card(CardSuite::from($suite), CardRank::from($rank));
            }
        }

        $this->assertCount(56, $cards);
        $this->assertCount(1, array_filter($cards, static function(Card $card) {
            return $card->getName() === 'Ace of Spades';
        }));

        $this->assertCount(28, array_filter($cards, static function(Card $card) {
            return $card->getColor() === 'Black';
        }));

        $this->assertCount(4, array_filter($cards, static function(Card $card) {
            return $card->getRank() === 'Joker';
        }));
    }
}
