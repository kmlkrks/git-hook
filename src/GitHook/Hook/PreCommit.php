<?php

/**
 * This file is part of GitHook
 *
 * (c) Kemal KARAKAŞ <kmlkarakas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GitHook\Hook;

use GitHook\Configuration\Configuration;
use GitHook\Rule\RuleInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * This is the git hook class for pre-commit.
 *
 * @author Kemal KARAKAŞ <kmlkarakas@gmail.com
 */
class PreCommit extends Application
{
    /**
     * PreCommit constructor. Execute parent class constructer, set name and version.
     */
    public function __construct()
    {
        parent::__construct('GitHook', Configuration::VERSION);
    }

    /**
     * Execute method of this class
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws \Exception
     *
     * @return void
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->getLongVersion());
        $files = $this->extractFiles();

        $rules = Configuration::getRegisteredRules();

        foreach ($files as $file) {

            foreach ($rules as $rule) {
                if ($rule instanceof RuleInterface) {
                    if (!$rule->execute($file)) {
                        throw new \Exception(
                            sprintf($rule->getErrorMessage(), $file)
                        );
                    }
                }
            }
        }

        $output->writeln('<info>Thanks :) Everything is ok!</info>');
    }

    /**
     * Extract committed files.
     *
     * @return array
     */
    private function extractFiles()
    {
        exec("git diff --cached --name-only --diff-filter=ACM", $output);
        return $output;
    }
}
