<?php

namespace App\Http\Controllers;

use App\Models\Instance;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Instance::all()
            ->map->latest_report
            ->map->packages
            ->flatten()
            ->map(function ($pkg) {
                return [
                    'name' => $pkg->name,
                    'version' => $pkg->version,
                ];
            })->unique()
            ->groupBy('name');

        return view('package.index', [
            'packages' => $packages,
        ]);
    }

    public function show($package)
    {
        $instances = Instance::select('instances.id', 'instances.name')
            ->with('latest_report')
            ->join('reports', function ($query) {
                $query->on('instances.id', '=', 'reports.instance_id')
                    ->whereRaw('reports.id IN (select MAX(r2.id) from reports r2 join instances i2 on i2.id = r2.instance_id group by i2.id)');
            })
            ->join('packages', 'packages.report_id' , '=', 'reports.id')
            ->where('packages.name', $package)
            ->get();

        return view('package.show', [
            'package' => $package,
            'instances' => $instances,
        ]);
    }
}
