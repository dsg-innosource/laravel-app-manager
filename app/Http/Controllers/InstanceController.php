<?php

namespace App\Http\Controllers;

use App\Models\Instance;

class InstanceController extends Controller
{
    public function index()
    {
        return view('instance.index', [
            'instances' => Instance::all(),
        ]);
    }
}
