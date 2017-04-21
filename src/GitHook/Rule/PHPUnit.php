<?php

/**
 * This file is part of GitHook
 *
 * (c) Kemal KARAKAÞ <kmlkarakas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GitHook\Rule;

use Symfony\Component\Process\Process;

/**
 * Class PHPUnit
 * @package GitHook\Rule
 * @since 1.0.1
 *
 */
class PHPUnit implements RuleInterface
{
    /**
     * Description of this class
     *
     * @var String
     */
    private $description = 'PHPUnit tests runner';

    /**
     * Error message of this class
     *
     * @var string
     */
    private $errorMessage = 'Please make sure all tests are working.';

    /**
     * $description getter method
     *
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Getter method of error message.
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * This method is runner of this class
     *
     * @param String $file
     * @return bool
     */
    public function execute($file)
    {
        $process = new Process('phpunit');

        try {
            $process->run();
            if (strstr($process->getOutput(), 'FAILURES!')) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
