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

/**
 * Interface RuleInterface.
 *
 * Every rule files must be implement this interface.
 *
 * @package GitHook\Rule
 */
interface RuleInterface
{
    /**
     * @param $file
     * @return mixed
     */
    public function execute($file);

    /**
     * @return mixed
     */
    public function getDescription();

    /**
     * @return mixed
     */
    public function getErrorMessage();
}
