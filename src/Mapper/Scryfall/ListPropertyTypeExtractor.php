<?php

namespace App\Mapper\Scryfall;

use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\PropertyInfo\Type;

class ListPropertyTypeExtractor implements PropertyTypeExtractorInterface
{

    public function getTypes(string $class, string $property, array $context = [])
    {
        //TODO
    }
}