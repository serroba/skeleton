<?php

namespace App\File;

class Collection
{
    private array $files = [];

    /**
     * @param File[] $files
     */
    public function __construct(array $files)
    {
        $this->files = $files;
    }

    /**
     * @return File[]
     */
    public function getFiles(): array
    {
        return $this->files;
    }
}