<?php

namespace App\Mapper;

use App\Entity\Card;
use Symfony\Component\Uid\Uuid;

class CardMapper
{
    private function createCard(
        Uuid|string $oracleUuid
    ): Card
    {
        $card = new Card();

        $card->setOracleUuid($oracleUuid);

        return $card;
    }

    /**
     * @param array{oracle_id:string} $cardSerialized
     * @return Card
     */
    public function fromScryfall(array $cardSerialized): Card
    {
        $card = $this->createCard(
            oracleUuid: $cardSerialized["oracle_id"]
        );
        return $card;
    }
}