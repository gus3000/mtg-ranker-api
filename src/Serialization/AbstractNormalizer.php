<?php

namespace App\Serialization;

use Normalizer;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * @template T
 */
abstract class AbstractNormalizer
{
    protected NormalizerInterface $normalizer;

    public function __construct(protected string $normalizedClass, PropertyTypeExtractorInterface $propertyTypeExtractor = null)
    {
        $this->normalizer = new ObjectNormalizer(
            propertyTypeExtractor: $propertyTypeExtractor
        );
    }


    /**
     * @param T $data
     * @param string|null $format
     * @param array $context
     * @return array
     * @throws ExceptionInterface
     */
    public function normalize(mixed $data, string $format = null, array $context = [])
    {
        return $this->normalizer->normalize($data, $format, $context);
    }

    /**
     * @param array $data
     * @param string|null $format
     * @param array $context
     * @return T
     * @throws ExceptionInterface
     */
    public function denormalize(array $data, string $format = null, array $context = [])
    {
        return $this->normalizer->denormalize($data, $this->normalizedClass, $format, $context);
    }
}