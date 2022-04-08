<?php

namespace App\Serialization\Scryfall;

use App\Entity\Scryfall\BulkData;
use App\Serialization\AbstractNormalizer;

class BulkDataNormalizer extends AbstractNormalizer
{
    public function __construct()
    {
        parent::__construct(BulkData::class);
    }

}