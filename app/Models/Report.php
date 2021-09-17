<?php

namespace App\Models;

use App\Models\Instance;
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
}
