<?php

namespace S3geeks\Events\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use S3geeks\Events\Models\country;
use S3geeks\Events\Models\division;


class MasterController extends Controller
{

    public function getCountries()
    {
        $centers = country::all();
        return response()->json($centers);
    }

    public function getDivisions()
    {
        $centers = division::all();
        return response()->json($centers);
    }
}
