<?php

namespace Tests\Unit;

use App\Helper\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function test_example(): void
    {
        $converter = new Converter();

        $hasil1 = $converter->formatDate('10 Februari 2023');
        $hasil2 = $converter->formatDate('10 februari 2023');
        $hasil3 = $converter->formatDate('4 AGUSTUS 2023');

        $this->assertEquals('2023-02-10', $hasil1);
        $this->assertEquals('2023-02-10', $hasil2);
        $this->assertEquals('2023-08-04', $hasil3);
    }
}
