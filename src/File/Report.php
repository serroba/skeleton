<?php

namespace App\File;

class Report
{
    private int $totalSize;
    private array $collectionSummary;

    public function __construct(int $totalSize, array $collectionSummary)
    {
        $this->totalSize = $totalSize;
        $this->collectionSummary = $collectionSummary;
    }

    /**
     * @return int
     */
    public function getTotalSize(): int
    {
        return $this->totalSize;
    }

    /**
     * @return array
     */
    public function getCollectionSummary(): array
    {
        return $this->collectionSummary;
    }

}