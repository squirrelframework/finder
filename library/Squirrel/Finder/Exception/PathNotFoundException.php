<?php

namespace Squirrel\Finder\Exception;

/**
 * Exception class thrown when a path was not found.
 *
 * @package Squirrel\Finder\Exception;
 * @author Valérian Galliat
 */
class PathNotFoundException extends \RuntimeException
{
    /**
     * @param string $path Path that was not found.
     */
    public function __construct($path)
    {
        parent::__construct(sprintf('Unable to find path "%s".', $path));
    }
}
