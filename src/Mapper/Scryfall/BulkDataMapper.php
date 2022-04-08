<?php

namespace App\Mapper\Scryfall;

use App\Entity\Scryfall\BulkData;
use App\Entity\Scryfall\ScryfallList;
use App\Serialization\Scryfall\BulkDataNormalizer;
use App\Serialization\Scryfall\ListSerializer;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use function dump;

class BulkDataMapper
{

    public function __construct(
        protected ListSerializer $listSerializer,
        protected BulkDataNormalizer $bulkDataNormalizer,
    )
    {
//        $encoders = [new JsonEncoder()];
//        $normalizers = [new ObjectNormalizer(), new ArrayDenormalizer()];
//        $this->serializer = new Serializer($normalizers, $encoders);


    }

    /**
     * @param string $json
     * @return BulkData[]
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function fromJson(string $json): array
    {
        $bulkDataList = $this->listSerializer->deserialize($json, 'json');

        dump($bulkDataList);
        dump($bulkDataList->getData());

        $data = $bulkDataList->getData();
        $bulkData = $this->bulkDataNormalizer->denormalize($data[0]);

        dump($bulkData);

        return [];
    }
}