<?php

/**
 * This file is part of GitHook
 *
 * (c) Kemal KARAKAŞ <kmlkarakas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GitHook\Rule;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Class VarDump
 *
 * @author Kemal KARAKAŞ <kmlkarakas@gmail.com>
 * @since 1.0.0
 */
class VarDump implements RuleInterface
{
    /**
     * Description of this class
     *
     * @var String
     */
    private $description = 'PHP debug methods usage checker';

    /**
     * Error message of this class
     *
     * @var string
     */
    private $errorMessage = '%s file contains a var_dump or print_r or dump!';

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
     * $description getter method
     *
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * This method is runner of this class
     *
     * @param String $file
     * @return bool
     */
    public function execute($file)
    {
        $process = new Process(sprintf('egrep -iqE \'print_r|var_dump|dump|die\' %s 2>&1', $file));

        try {
            $process->mustRun();
            return false;
        } catch (ProcessFailedException $e) {
            return true;
        }
    }
}
