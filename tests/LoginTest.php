<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function login_form_success()
    {
        // Vstavim uporabnika, da bo prijava uspešna
        DB::table('users')->insert([
            'name'     => 'John Doe',
            'email'    => 'test@gmail.com',
            'password' => bcrypt('moje_geslo'),
        ]);

        // preverim za uspešno prijavo OPIS TEGA IMAŠ V RegistrationTest.php
        $this->visit('/login')->type('moje_geslo', 'password')->type('test@gmail.com', 'email')->press('Login')
            ->seePageIs('/statuses');
    }

    /** @test */
    public function login_form_fail()
    {
        // Ni uporabnika, bo FAIL!
        $this->visit('/login')->type('a', 'password')->type('test@gmail.com', 'email')->press('Login')
            ->see('These credentials do not match our records.');
    }

    /** @test */
    public function logged_in_regular()
    {
        $user = factory(App\User::class, 1)->create();

        // Kreiramo naključnega uporabnika, ga prijavimo, obiščemo /statuses, obiščemo /admin/users, smo preusmerjeni nazaj na /statuses ker nismo admin!
        $this->actingAs($user)->visit('/statuses')->visit('/admin/users')->seePageIs('/statuses');
    }

    /** @test */
    public function logged_in_admin()
    {
        $user = factory(App\User::class, 1)->create([ 'admin' => true ]);
        // Vidimo /admin/users, ker smo admin!
        $this->actingAs($user)->visit('/statuses')->visit('/admin/users')->seePageIs('/admin/users');

    }
}
