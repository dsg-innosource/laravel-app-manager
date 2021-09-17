<?php

namespace App\View\Components;

use App\Models\Instance;
use Illuminate\View\Component;

class InstanceCard extends Component
{

    public $env;
    public $instance;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Instance $instance)
    {
        $this->instance = $instance;
        $this->env = $instance->latest_report->environment->name;
    }

    public function getCustomPackageVersions()
    {
        return $this->instance->latest_report->packages->filter(function ($package) {
            return in_array($package->name, config('lam.packages'));
        })->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.instance-card');
    }
}
