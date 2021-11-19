<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Instances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid space-x-4 lg:grid-cols-5">
                <div class="space-y-4">
                    <div>
                        <div class="text-xs tracking-widest text-gray-400 uppercase">Environment</div>
                        <div class="mt-2 space-y-2">
                            <a href="{{ route('instances.index') . '?env=all' }}" class="block px-2 py-px text-sm text-gray-800 uppercase rounded-md opacity-75 cursor-pointer hover:opacity-100">
                                <span class="px-2 py-px tracking-wider uppercase bg-white rounded-md">ALL</span>
                            </a>
                            @foreach($environments as $env)
                                <a href="{{ route('instances.index') . '?env=' . $env->name }}" class="block px-2 py-px text-sm text-gray-800 uppercase rounded-md opacity-75 cursor-pointer hover:opacity-100">
                                    <span class="rounded-md px-2 py-px uppercase tracking-wider bg-{{$env->color}}-200 text-{{$env->color}}-800">{{$env->name}}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <div class="text-xs tracking-widest text-gray-400 uppercase">Packages</div>
                        <div class="mt-2 space-y-2">
                            @foreach(config('lam.packages') as $package)
                                <a href="{{ route('packages.show', ['package' => $package]) }}" class="block px-2 py-px text-sm text-gray-800 rounded-md opacity-75 cursor-pointer hover:opacity-100">
                                    {{$package}}
                                </a>
                            @endforeach
                        </div>
                    </div>
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
