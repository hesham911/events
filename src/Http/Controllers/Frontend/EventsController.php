<?php

namespace S3geeks\Events\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {
        return view('frontendEvents::index');
    }
}
