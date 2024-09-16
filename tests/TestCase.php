<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        DB::delete("DELETE FROM products");
        DB::delete("DELETE FROM categories");
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 6");
        DB::statement("ALTER TABLE categories AUTO_INCREMENT = 7");
    }
}
