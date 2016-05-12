<?php

namespace LithuanifyBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CrawlCommand
 * @package LithuanifyBundle\Command
 */
class CrawlCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('crawler:start')
            ->setDescription('Crawl data')
            ->addArgument(
                'dateLimit',
                InputArgument::REQUIRED,
                'Enter dateLimit.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $crawler = $this->getContainer()->get('mk.crawler');
        $dateLimit = $input->getArgument('dateLimit');
        $crawler->setCrawlerDateLimit(strtotime($dateLimit));
        $nextPage = $crawler->getOuterPage();

        do {
            $crawler->getOuterPage($nextPage);
        } while (!is_null($nextPage));
    }
}
