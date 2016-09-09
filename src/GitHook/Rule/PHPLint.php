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

use Symfony\Component\Process\ProcessBuilder;

/**
 * Class PHPLint
 *
 * @author Kemal KARAKAŞ <kmlkarakas@gmail.com>
 * @since 1.0.0
 */
class PHPLint implements RuleInterface
{
    /**
     * Description of this class
     *
     * @var String
     */
    private $description = 'PHP syntax checker';

    /**
     * Error message of this class
     *
     * @var string
     */
    private $errorMessage = '%s file contains a PHP syntax error!';

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
        $builder = new ProcessBuilder(array('php', '-l', $file));
        $process = $builder->getProcess();
        $process->run();

        if (!$process->isSuccessful()) {
            return false;
        }

        return true;
    }
}
