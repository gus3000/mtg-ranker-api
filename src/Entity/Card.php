<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'uuid')]
    private Uuid $oracleUuid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOracleUuid()
    {
        return $this->oracleUuid;
    }

    public function setOracleUuid(Uuid|string $oracleUuid): self
    {
        if(is_string($oracleUuid))
            $oracleUuid = Uuid::fromString($oracleUuid);

        $this->oracleUuid = $oracleUuid;

        return $this;
    }
}
