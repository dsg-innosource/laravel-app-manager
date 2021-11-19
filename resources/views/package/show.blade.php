<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $package }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach($instances as $instance)
                    <div class="relative flex items-center px-6 py-5 space-x-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-500">
                        <div class="flex-1 min-w-0">
                            <a href="{{ route('instances.show', ['instance' => $instance]) }}" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <div class="flex items-center justify-between">
                                    <div class="text-brand-700">{{$instance->name}}</div>
                                    <div>{{$instance->latest_report->packages->where('name', $package)->first()->version}}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
