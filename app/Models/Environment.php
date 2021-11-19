<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['color'];

    public function getColorAttribute()
    {
        return config("lam.environment_colors.{$this->name}") ? config("lam.environment_colors.{$this->name}") : 'brand';
    }
}
