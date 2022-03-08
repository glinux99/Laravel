<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Node;

use function array_filter;
use function count;
use function range;
use SebastianBergmann\CodeCoverage\CrapIndex;
use SebastianBergmann\LinesOfCode\LinesOfCode;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class File extends AbstractNode
{
    /**
     * @var array
     */
    private $lineCoverageData;

    /**
     * @var array
     */
    private $functionCoverageData;

    /**
     * @var array
     */
    private $testData;

    /**
     * @var int
     */
    private $numExecutableLines = 0;

    /**
     * @var int
     */
    private $numExecutedLines = 0;

    /**
     * @var int
     */
    private $numExecutableBranches = 0;

    /**
     * @var in