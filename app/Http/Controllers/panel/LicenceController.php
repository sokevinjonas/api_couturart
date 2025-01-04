<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LicenceController extends Controller
{
    public function create()
    {
        return view('admin.licences.create');
    }
}
