<?php

namespace Squirrel\Finder;

use Squirrel\Finder\Exception\PathNotFoundException;

/**
 * Abstract class for finders.
 * 
 * @package Squirrel\Finder
 * @author Valérian Galliat
 */
abstract class Finder implements FinderInterface
{
    /**
     * {@inheritdoc}
     */
    public function findFile($path)
    {
        $file = $this->find($path);

        if (!is_file($file)) {
            throw new PathNotFoundException($path);
        }

        return $file;
    }

    /**
     * {@inheritdoc}
     */
    public function findFolder($path)
    {
        $folder = $this->find($path);

        if (!is_dir($folder)) {
            throw new PathNotFoundException($path);
        }

        return $folder;
    }
}
