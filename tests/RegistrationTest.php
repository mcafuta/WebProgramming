<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function registration_form_success()
    {
        // Odpre registracijo, v ime vtipka Manja Cafuta, v password vtipka ... in ob pritisku na gumb Register vidi stran /statuses torej je bil uspešno registriran.
        $this->visit('/register')->type('Manja Cafuta', 'name')->type('moje_geslo', 'password')
            ->type('moje_geslo', 'password_confirmation')->type('gmail@manja.com', 'email')->press('Register')
            ->seePageIs('/statuses');
    }

    /** @test */
    public function registration_form_fail()
    {
        // Odpre registracijo, v ime vtipka Manja Cafuta, v password vtipka ... in ob pritisku na gumb Register vidi opozorilo, ker je vnešen email napačne oblike!
        $this->visit('/register')->type('Manja Cafuta', 'name')->type('moje_geslo', 'password')
            ->type('moje_geslo', 'password_confirmation')->type('manja.cafuta', 'email')->press('Register')
            ->see('The email must be a valid email address.');
    }
}
