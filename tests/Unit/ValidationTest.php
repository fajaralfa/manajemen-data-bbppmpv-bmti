<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    public function testYear(): void
    {
        $actual = date('Y-m-d', 0);
        $this->assertEquals('1970-01-01', $actual);
    }
}
