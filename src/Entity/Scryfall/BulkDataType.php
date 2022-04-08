<?php

namespace App\Entity\Scryfall;

enum BulkDataType: string
{
    case ORACLE_CARDS = 'oracle_cards';
    case UNIQUE_ARTWORK = "unique_artwork";
    case DEFAULT_CARDS = "default_cards";
    case ALL_CARDS = "all_cards";
    case RULINGS = "rulings";
}