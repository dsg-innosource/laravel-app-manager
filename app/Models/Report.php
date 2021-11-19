<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'composer_versions' => 'array',
        'config' => 'array',
    ];

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }

    public function environment()
    {
        return $this->belongsTo(Environment::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function getCustomPackageVersionsAttribute()
    {
        return collect(config('lam.packages'))->map(function ($highlightedPackage) {
            if ($this->packages) {
                $matchingPackage = $this->packages->filter(function ($package) use ($highlightedPackage) {
                    return $package->name == $highlightedPackage;
                });

                if ($matchingPackage->count()) {
                    $version = $matchingPackage->first()->version;
                }
            }

            return [
                'name' => $highlightedPackage,
                'version' => $version ?? '',
            ];
        })->toArray();
    }
}
