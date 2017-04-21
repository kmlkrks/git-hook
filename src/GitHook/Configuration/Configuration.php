<?php

/**
 * This file is part of GitHook
 *
 * (c) Kemal KARAKAŞ <kmlkarakas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GitHook\Configuration;

use GitHook\Rule\PHPLint;
use GitHook\Rule\PHPUnit;
use GitHook\Rule\VarDump;

/**
 * Class Configuration
 *
 * @package GitHook\Configuration
 *
 * @author Kemal KARAKAŞ <kmlkarakas@gmail.com>
 */
class Configuration
{
    const VERSION = '1.0.0';

    /**
     * @return array
     */
    public static function getRegisteredRules()
    {
        return [
            new VarDump(),
            new PHPLint(),
            new PHPUnit()
        ];
    }
}
