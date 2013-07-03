<?php

namespace Squirrel\Finder;

use Squirrel\Finder\Exception\PathNotFoundException;

/**
 * Finder allowing to search in a single directory.
 * 
 * @package Squirrel\Finder
 * @author Valérian Galliat
 */
class SimpleFinder extends Finder
{
    /**
     * Root directory to find in.
     * @var string
     */
    protected $root;

    /**
     * @throws \InvalidArgumentException If given root is not a valid directory.
     * @param string $root Root directory to find in.
     */
    public function __construct($root)
    {
        if (!is_dir($root)) {
            throw new \InvalidArgumentException('Given root is not a valid directory');
        }

        $this->root = realpath($root);
    }

    /**
     * {@inheritdoc}
     */
    public function find($path)
    {
        $fullPath = $this->root . '/' . $path;

        if (file_exists($fullPath)) {
            return realpath($fullPath);
        }

        throw new PathNotFoundException($path);
    }
}
