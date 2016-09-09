<?php

namespace GitHook\Tests\Rule;

use Symfony\Component\Process\Process;

class VarDumpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function execute()
    {
        $file = __DIR__ . "/../Fixtures/CommitedFile.php";

        $process = new Process(sprintf('egrep -iqE \'print_r|var_dump|dump\' %s 2>&1', $file));

        $process->run();

        $this->assertTrue($process->isSuccessful());
    }
}
