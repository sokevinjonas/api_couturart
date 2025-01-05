<?php

namespace App\Http\Controllers\panel;

use App\Models\Licence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
   public function index()
   {
    $licences = Licence::all();

    return view('admin.Parametres.index', compact('licences'));
   }
}
