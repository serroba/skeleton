<?php

namespace App\Tests\File;

use App\File\File;
use App\File\SizeReporter;
use Monolog\Test\TestCase;

class SizeReporterTest extends TestCase
{
    public function testReporterReportsTotalSize()
    {
        $reporter = new SizeReporter([
            new File(100),
            new File(200, 'collection1'),
            new File(200, 'collection1'),
            new File(300, 'collection2'),
            new File(10)
        ]);

        $this->assertSame(810, $reporter->reportTotalSize());
    }

    public function testReportCountsAggregateCollections()
    {
        $subject = new SizeReporter([
            new File(100),
            new File(200, 'collection1'),
            new File(200, 'collection1'),
            new File(300, 'collection2'),
            new File(10)
        ]);

        $summary = $subject->reportSizeByTopNCollection(1);
        $this->assertSame(400, $summary->getTotalSize());
        $this->assertSame('collection1', $summary->getCollectionSummary()[0]['collectionName']);
    }
}