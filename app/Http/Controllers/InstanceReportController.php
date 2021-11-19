<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Instance;
use App\Models\Report;
use Illuminate\Http\Request;

class InstanceReportController extends Controller
{
    public function store(Request $request, $uuid)
    {
        $instance = Instance::where('uuid', $uuid)->firstOrFail();

        $config = json_decode($request->config, true);

        $environment = Environment::firstOrCreate(['name' => $config['app']['env']]);

        $report = $instance->reports()->create([
            'environment_id' => $environment->id,
            'php_version' => $request->php_version,
            'database_version' => $request->database_version,
            'config' => $config,
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

    public function show(Instance $instance, Report $report)
    {
        $report->load('packages');

        return view('report.show', [
            'instance' => $instance,
            'report' => $report,
        ]);
    }
}
