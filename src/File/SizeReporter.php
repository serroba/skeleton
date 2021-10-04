<?php

namespace App\File;

class SizeReporter
{
    /**
     * @var Collection[]
     */
    private array $collections;

    /** @var File[][] */
    private array $files = [];

    /**
     * @param File[] $files
     */
    public function __construct(array $files)
    {
        foreach ($files as $file) {
            $this->files[$file->getCollection() ?? 0][] = $file;
        }
    }

    public function reportTotalSize(): int
    {
        $size = 0;
        foreach ($this->files as $collection => $files) {
            foreach ($files as $file) {
                $size += $file->getSize();
            }
        }
        return $size;
//        return array_reduce($this->files, fn (File $file) => $file->getSize(), 0);
    }

    public function reportSizeByTopNCollection(int $topCollection)
    {
        $chunks = [];
        foreach ($this->files as $collection => $files) {
            $size = 0;
            foreach ($files as $file) {
                $size += $file->getSize();
            }
            $chunks[] = ['size' => $size, 'collection' => $collection];
        }
        arsort($chunks, SORT_REGULAR);
        $collectionSummary = [];
        $i = 1;
        $totalSize = 0;
        foreach ($chunks as $chunk) {
            $collectionSummary[] = [
                'sizeCollection' => $chunk['size'],
                'collectionName' => $chunk['collection'],
            ];
            $totalSize += $chunk['size'];
            if ($i === $topCollection) {
                break;
            }
            $i++;
        }
        return new Report($totalSize, $collectionSummary);

    }
}