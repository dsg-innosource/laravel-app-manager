<?php

namespace App\Http\Controllers;

use App\Models\Instance;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class InstanceRegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'config' => 'required',
        ]);

        $config = json_decode($request->config, true);

        $instance = Instance::create([
            'name' => $config['app']['name'],
            'uuid' => Uuid::uuid4()->toString(),
        ]);

        $instance->reports()->create([
            'php_version' => $request->php_version,
            'database_version' => $request->database_version,
            'composer_versions' => $request->composer_versions,
            'config' => $request->config,
        ]);

        return response()->json([
            'status' => 'success',
            'uuid' => $instance->uuid,
        ]);
    }
}
