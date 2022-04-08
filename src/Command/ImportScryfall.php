<?php

namespace App\Command;

use App\Mapper\CardMapper;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;

#[AsCommand(
    name: 'app:import:scryfall',
    description: 'Imports card data from a scryfall dump file'
)]
class ImportScryfall extends Command
{
    private const INPUT_ARG_DUMP_FILE = 'dump_file';

    protected Filesystem $filesystem;
    protected SymfonyStyle $style;

    public function __construct(
        protected CardMapper $cardMapper,
    )
    {
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->addArgument(self::INPUT_ARG_DUMP_FILE, InputArgument::REQUIRED, 'the scryfall dump file');
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->filesystem = new Filesystem();
        $this->style = new SymfonyStyle($input, $output);
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $filePath = $input->getArgument(self::INPUT_ARG_DUMP_FILE);
        if (!$this->filesystem->exists($filePath)) {
            $this->style->error(sprintf("File \"%s\" does not exists.", $filePath));
            return self::INVALID;
        }

        $cards = json_decode(file_get_contents($filePath),associative: true);

        foreach ($cards as $scryfallCard) {
            $card = $this->cardMapper->fromScryfall($scryfallCard);
            dump($card);
        }

        return self::SUCCESS;
    }

}