<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   public function index()
   {
    return view('admin.Parametres.index');
   }
}
