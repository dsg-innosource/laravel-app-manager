<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Instances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid space-x-4 lg:grid-cols-5">
                <div>
                    <div class="text-xs tracking-widest text-gray-400 uppercase">Environment</div>
                    @foreach($environments as $env)
                        {{$env->name}}
                    @endforeach
                </div>
                <div class="grid grid-cols-2 col-span-4 gap-4">
                    @foreach($instances as $instance)
                        <x-instance-card :instance="$instance"></x-instance-card>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
