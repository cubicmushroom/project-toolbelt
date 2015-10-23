<?php

namespace CubicMushroom\Tools\ProjectToolbelt\Console\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class SetupCommand
 *
 * @package CubicMushroom\Tools\ProjectToolbelt
 *
 * @see     \spec\CubicMushroom\Tools\ProjectToolbelt\Console\Command\SetupCommandSpec for spec
 */
class SetupCommand extends Command
{
    const NAME        = 'setup';
    const DESCRIPTION = 'Sets up the toolbelt for the given project';
    const BINARY_FILE = 'toolbelt';


    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this
            ->setName(Command::NAME.':'.self::NAME)
            ->setDescription(self::DESCRIPTION)
            ->addArgument('path', InputArgument::OPTIONAL, 'Project path');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fs = new Filesystem();

        $binDir = TOOLBELT_BIN;

        if (!$fs->exists($binDir)) {
            $fs->mkdir($binDir);
        }

        $fs->touch($binDir.'/toolbelt');
    }


}
