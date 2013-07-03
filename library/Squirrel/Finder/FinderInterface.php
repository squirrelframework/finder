<?php

namespace Squirrel\Finder;

/**
 * Interface providing finding functions in filesystem.
 *
 * @package Squirrel\Finder
 * @author Valérian Galliat
 */
interface FinderInterface
{
    /**
     * Finds a file or a folder.
     * 
     * @throws \Squirrel\Finder\Exception\PathNotFoundException If no fild or folder is found.
     * @param string $path Path to search for.
     * @return string Complete path of file.
     */
    public function find($path);

    /**
     * Finds a file.
     * 
     * @throws \Squirrel\Finder\Exception\PathNotFoundException If no file is found.
     * @param string $path Path to search for.
     * @return string Complete path of file.
     */
    public function findFile($path);

    /**
     * Finds a folder.
     * 
     * @throws \Squirrel\Finder\Exception\PathNotFoundException If no folder is found.
     * @param string $path Path to search for.
     * @return string Complete path of file.
     */
    public function findFolder($path);
}
