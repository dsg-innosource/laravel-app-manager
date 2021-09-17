<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Instance;

class InstanceController extends Controller
{
    public function index()
    {
        return view('instance.index', [
            'instances' => Instance::all(),
            'environments' => Environment::all(),
        ]);
    }
}
