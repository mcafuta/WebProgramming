<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Status;
use App\User;

class StatusTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_not_view_other_status()
    {
        // POGLEJ V database/factories/ModelFactory.php
        // Ustvari uporabnika in en status
        $user1   = factory(App\User::class, 1)->create();
        $status1 = factory(App\Status::class)->create([ 'user_id' => $user1->id ]);

        // Ustvari uporabnika in en status
        $user2   = factory(App\User::class, 1)->create();
        $status2 = factory(App\Status::class)->create([ 'user_id' => $user2->id ]);

        // actingAs se prijavi kot $user1, obišče sledečo stran in vidi napis Edit entry.
        $this->actingAs($user1)->visit('/statuses/' . $status1->id . '/edit')->see('Edit entry');
        // Enak user torej $user1 poskusi pogledat še status $user2 in dobi 403, Unauthorized attempt
        $this->get('/statuses/' . $status2->id . '/edit')->assertResponseStatus(403);
    }

    /** @test */
    public function can_view_other_status()
    {
        $user1   = factory(App\User::class, 1)->create([ 'admin' => true ]);
        $status1 = factory(App\Status::class)->create([ 'user_id' => $user1->id ]);

        $user2   = factory(App\User::class, 1)->create();
        $status2 = factory(App\Status::class)->create([ 'user_id' => $user2->id ]);

        $this->actingAs($user1)->visit('/statuses/' . $status1->id . '/edit')->see('Edit entry');
        // Enako kot zgoraj, le da je $user1 admin in lahko odpre statuse drugih.
        $this->get('/statuses/' . $status2->id . '/edit')->assertResponseStatus(200);
    }

    /** @test */
    public function returns_success_on_delete()
    {
        $user1   = factory(App\User::class, 1)->create([ 'admin' => true ]);
        $status1 = factory(App\Status::class)->create([ 'user_id' => $user1->id ]);

        // Ob izbrisu statusa nam funkcija vrne "success"
        $this->call('DELETE', '/statuses/' . $status1->id . '/delete')->getContent('success');
    }
}
