<?php

namespace App\Command;

use App\Entity\Scryfall\BulkData;
use App\Entity\Scryfall\ScryfallList;
use App\Mapper\Scryfall\BulkDataMapper;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use function json_encode;

#[AsCommand(
    name: 'app:prepare:download-scryfall',
    description: 'Downloads the last scryfall dump file, if it is not already present'
)]
class DownloadScryfallBulk extends Command
{
    protected Filesystem $filesystem;
    protected SymfonyStyle $style;

    public function __construct(
        protected HttpClientInterface $scryfallClient,
        protected BulkDataMapper $bulkDataMapper,
    )
    {
        parent::__construct();
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->filesystem = new Filesystem();
        $this->style = new SymfonyStyle($input, $output);
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $response = $this->scryfallClient->request('GET', '/bulk-data');

//        $bulkData = json_decode($response->getContent());

        $bulkData = $this->bulkDataMapper->fromJson($response->getContent());


        dump($bulkData);
        return self::SUCCESS;
    }


}