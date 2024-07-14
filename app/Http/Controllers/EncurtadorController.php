<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class EncurtadorController extends Controller
{
    public function index()
    {
        return view('encurtador.index');
    }

    public function redirecionar($url)
    {
        $originalURL = Link::where('short_url', url()->current())->first();
        return redirect($originalURL->original_url);
    }
}
