<?php

namespace Ketmo\Command;

use Herrera\Phar\Update\Manager;
use Herrera\Phar\Update\Manifest;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('update')
            ->setDescription('Self update PHAR file')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = new Manager(Manifest::loadFile(
            'http://mattketmo.github.io/my-cli/manifest.json'
        ));

        $output->writeln('Looking for updates...');

        $currentVersion = $this->getApplication()->getVersion();

        if ($manager->update($currentVersion, true)) {
            $output->writeln('<info>Updated to latest version</info>');
        } else {
            $output->writeln('<comment>Already up-to-date.</comment>');

        }
    }
}
