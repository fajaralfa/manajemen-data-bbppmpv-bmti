<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DBConnectionTest extends TestCase
{
    public function testConnection(): void
    {
        $namaDatabase = DB::getDatabaseName();
        $this->assertEquals('multimedia', $namaDatabase);
    }
}
