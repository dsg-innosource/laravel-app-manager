<?php

namespace App\Http\Controllers;

use App\Models\Instance;
use Illuminate\Http\Request;

class InstanceReportController extends Controller
{
    public function __invoke(Request $request, $uuid)
    {
        $instance = Instance::where('uuid', $uuid)->firstOrFail();

        $instance->reports()->create([
            'php_version' => $request->php_version,
            'database_version' => $request->database_version,
            'composer_versions' => $request->composer_versions,
            'config' => $request->config,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
}
