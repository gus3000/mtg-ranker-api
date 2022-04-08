<?php

namespace App\Serialization\Scryfall;

use App\Entity\Scryfall\ScryfallList;
use App\Serialization\AbstractSerializer;
use Exception;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use function is_a;

/**
 * @extends AbstractSerializer<ScryfallList>
 */
class ListSerializer extends AbstractSerializer
{
    public function __construct()
    {
        parent::__construct(ScryfallList::class);
    }
}