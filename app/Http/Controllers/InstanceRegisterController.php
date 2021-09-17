<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Instance;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class InstanceRegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        ray($request);
        $request->validate([
            'config' => 'required',
        ]);

        $config = json_decode($request->config, true);

        $instance = Instance::create([
            'name' => $config['app']['name'],
            'uuid' => Uuid::uuid4()->toString(),
        ]);

        $environment = Environment::firstOrCreate(['name' => $config['app']['env']]);

        $report = $instance->reports()->create([
            'environment_id' => $environment->id,
            'php_version' => $request->php_version,
            'database_version' => $request->database_version,
            'config' => $request->config,
        ]);

        collect($request->composer_versions)->each(function ($version, $name) use ($report) {
            $report->packages()->create([
                'name' => $name,
                'version' => $version,
            ]);
        });

        return response()->json([
            'status' => 'success',
            'uuid' => $instance->uuid,
        ]);
    }
}
