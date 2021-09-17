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
        $this->env = $instance->latest_report->config['app']['env'];
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
