<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    public function testSplice(): void
    {
        $dataBobohongan = [1,2,3,4];
        $c = collect($dataBobohongan);
        $this->assertEquals([2,3,4], $c->splice(1)->all());
    }
}
