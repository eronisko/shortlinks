<?php

namespace Tests\Browser;

use App\Models\Shortlink;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_lists_user_shortlinks()
    {
        $shortlink = Shortlink::factory()->create();

        $this->browse(function (Browser $browser) use ($shortlink) {
            $browser
                ->loginAs($shortlink->owner)
                ->visit('/dashboard')
                ->assertSee($shortlink->path)
                ->assertSee($shortlink->longUrl)
            ;
        });
    }
}
