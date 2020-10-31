<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Shortlink;

class ShortlinkRedirectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_redirects_shortlink_to_long_url()
    {
        Shortlink::factory()->create([
            'path' => 'shortlink',
            'long_url' => 'https://long_url.com'
        ]);

        $response = $this->get('/l/shortlink');
        $response->assertRedirect('https://long_url.com');
    }
}
