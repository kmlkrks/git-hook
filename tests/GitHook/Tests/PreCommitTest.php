<?php

namespace GitHook\Tests;

use GitHook\Hook\PreCommit;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class PreCommitTest extends \PHPUnit_Framework_TestCase
{
    private $application;

    public function setUp()
    {
        parent::setUp();
        $this->application = new PreCommit();
    }

    /**
     * @test
     */
    public function doRun()
    {
        $output = new ConsoleOutput();
        $input = new ArrayInput([]);
        $this->assertEquals(0, $this->application->doRun($input, $output));
    }

}
