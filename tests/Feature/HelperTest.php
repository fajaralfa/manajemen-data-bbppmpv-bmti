<?php

namespace Tests\Feature;

use App\Helper\Converter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelperTest extends TestCase
{
    public function testDateFormatConverter()
    {
        $input = '1 Februari 2005';
        $out = Converter::formatDate($input);

        $this->assertEquals('2005-02-01', $out);
    }
}
