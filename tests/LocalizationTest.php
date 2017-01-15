<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocalizationTest extends TestCase
{
    /** @test */
    public function localization()
    {
        // Nastavi slovenski jezik in na strani za prijavo sedaj piše Prijava ne Login
        $this->withSession(['locale' => 'sl'])->visit('/login')->see('Prijava');
    }
}
