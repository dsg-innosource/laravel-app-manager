<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Instance;
use Illuminate\Http\Request;

class InstanceController extends Controller
{
    public function index(Request $request)
    {
        $instances = Instance::query()
            ->when($request->env && $request->env !== 'all', function ($query) use ($request) {
                return $query->whereHas('latest_report', function ($query) use ($request) {
                    return $query->whereHas('environment', function ($query) use ($request) {
                        $query->where('name', $request->env);
                    });
                });
            })
            ->get();

        return view('instance.index', [
            'instances' => $instances,
            'environments' => Environment::all(),
        ]);
    }

    public function show(Instance $instance)
    {
        $instance->load('latest_report', 'recent_reports');

        return view('instance.show', [
            'instance' => $instance,
        ]);
    }
}
