<?php

namespace App\File;

class File
{
    /**
     * @var int
     */
    private $size;
    private ?string $collection;

    public function __construct(int $size, ?string $collection = null)
    {

        $this->size = $size;
        $this->collection = $collection;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string|null
     */
    public function getCollection(): ?string
    {
        return $this->collection;
    }


}