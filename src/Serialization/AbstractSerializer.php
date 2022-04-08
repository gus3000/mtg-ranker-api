<?php

namespace App\Serialization;

use Exception;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use function is_a;

/**
 * @template T
 */
abstract class AbstractSerializer
{
    protected Serializer $serializer;

    public function __construct(protected string $serializedClass)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer(), new ArrayDenormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }


    /**
     * @param T $data
     * @param string $format
     * @param array $context
     * @return string
     */
    public function serialize(mixed $data, string $format, array $context = []): string
    {
        if (!is_a($data, $this->serializedClass))
            throw new Exception("This serializer should only be used on ScryfallList objects");

        return $this->serializer->serialize($data, $format, $context);

    }

    /**
     * @param mixed $data
     * @param string $format
     * @param array $context
     * @return T
     */
    public function deserialize(mixed $data, string $format, array $context = [])
    {
        return $this->serializer->deserialize($data, $this->serializedClass, $format, $context);

    }

}