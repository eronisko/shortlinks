<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;

class ShortlinkRedirectController extends Controller
{
    public function show(Shortlink $shortlink)
    {
        return redirect($shortlink->long_url);
    }
}
