<?php

namespace Ketmo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AcmeCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('acme')
            ->setDescription('Hack me')
            ->addArgument('name', InputArgument::OPTIONAL)
            ->addOption('yell', null, InputOption::VALUE_NONE)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $text = '<info>Hi</info>';

        $name = $input->getArgument('name');
        if ($name) {
            $text .= ' <comment>'.$name.'</comment>';
        }

        if ($input->getOption('yell')) {
            $text .= ' !!!';
        }

        $output->writeln($text);
    }
}
