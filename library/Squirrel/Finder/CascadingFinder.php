<?php

namespace Squirrel\Finder;

use Squirrel\Finder\Exception\PathNotFoundException;

/**
 * Finder allowing to define a cascading filesystem
 * and to search for files in it.
 * 
 * @package Squirrel\Finder
 * @author Valérian Galliat
 */
class CascadingFinder extends Finder
{
    /**
     * Root directories to find in.
     * @var string[]
     */
    protected $roots;

    /**
     * Adds a root directory in cascading filesystem.
     * 
     * @throws \InvalidArgumentException If given root is not a valid directory.
     * @param string $root Root directory to add.
     * @return CascadingFinder
     */
    public function addRoot($root)
    {
        if (!is_dir($root)) {
            throw new \InvalidArgumentException('Given root is not a valid directory.');
        }

        if (!isset($this->roots)) {
            $this->roots = array();
        }

        $this->roots[] = $root;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function find($path)
    {
        if (!isset($this->roots)) {
            throw new PathNotFoundException($path);
        }

        foreach ($this->roots as $root) {
            $fullPath = $root . '/' . $path;
            
            if (file_exists($fullPath)) {
                return realpath($fullPath);
            }
        }

        throw new PathNotFoundException($path);
    }
}
