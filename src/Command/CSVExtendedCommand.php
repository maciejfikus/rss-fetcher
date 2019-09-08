<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Command;

use MaciejFikus\RSSFetcher\Processor\ProcessorInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class CSVExtendedCommand extends Command
{
    protected static $defaultName = 'csv:extended';

    /** @var ProcessorInterface */
    private $articleProcessor;

    /** @var SymfonyStyle */
    private $io;

    protected function configure(): void
    {
        $this
            ->setDescription('Pobranie z URL danych RSS/Atom i zapisanie ich do pliku PATH.csv określonego przez argument PATH – jeśli plik istnieje, nowa zawartość zostanie dopisana! ')
            ->addArgument('url', InputArgument::REQUIRED, 'source .xml url')
            ->addArgument('path', InputArgument::REQUIRED, '.csv file output path');
    }

    public function __construct(ProcessorInterface $articleProcessor)
    {
        parent::__construct(self::$defaultName);

        $this->articleProcessor = $articleProcessor;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->io->title('Fetching RSS feed into CSV file.');

        try {
            $this->articleProcessor->process(
                $input->getArgument('url'),
                $input->getArgument('path')
            );

            $this->io->success('Successfully fetched ' . $input->getArgument('url') . ' into ' . $input->getArgument('path'));
        } catch (\Exception $ex) {
            $this->io->error('Something went wrong. '.$ex->getMessage());
        }
    }
}
