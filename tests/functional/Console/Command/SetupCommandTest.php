<?php
namespace CubicMushroom\Tools\ProjectToolbelt\Codeception\Console\Command;

use CubicMushroom\Tools\ProjectToolbelt\Console\Command\SetupCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class SetupCommandTest
 *
 * @package CubicMushroom\Tools\ProjectToolbelt
 */
class SetupCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * File path for the expected output binary file
     *
     * @var string
     */
    protected $expectedBinFile;


    /**
     * @param null   $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->expectedBinFile = __DIR__.'/../../../_output/app_root/bin/toolbelt';
    }


    protected function setUp()
    {
        $fs = new Filesystem();
        $fs->remove($this->expectedBinFile);
    }


    protected function tearDown()
    {
    }


    /**
     * Tests that the command outputs the expected text
     */
    public function testExpectedBinFileIsCreated()
    {
        $application = new Application();
        $application->add(new SetupCommand());

        $command = $application->find('toolbelt:setup');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));

        $this->assertFileExists($this->expectedBinFile);
    }
}