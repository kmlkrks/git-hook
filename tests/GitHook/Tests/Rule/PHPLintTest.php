<?php


namespace GitHook\Tests;

use Symfony\Component\Process\ProcessBuilder;

class PHPLintTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function execute()
    {
        $file = __DIR__ . "/../Fixtures/CommitedFile.php";

        $builder = new ProcessBuilder(array('php', '-l', $file));

        $process = $builder->getProcess();

        $process->run();

        $this->assertTrue($process->isSuccessful());
    }
}
