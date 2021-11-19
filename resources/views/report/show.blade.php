<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Report for <a class="text-brand-500" href="{{ route('instances.show', ['instance' => $instance->id]) }}">{{ $instance->name }}</a>
            </h2>
            <div class="text-xs text-gray-500">
                Report No. 
                <code class="px-2 py-px font-mono text-xs text-red-800 bg-gray-300 rounded">{{$report->id}}</code>
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-8">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Reported: <span class="font-bold">{{ $report->created_at->diffForHumans() }}</span>
                    <span class="text-xs">{{ $report->created_at }}</span>
                </h3>
                <dl class="grid grid-cols-1 mt-5 overflow-hidden bg-white divide-y divide-gray-200 rounded-lg shadow md:grid-cols-3 md:divide-y-0 md:divide-x">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">
                            PHP Version
                        </dt>
                        <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-brand-600">
                                {{ $report->php_version }}
                            </div>
                        </dd>
                    </div>
                    
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">
                            DB Version
                        </dt>
                        <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-brand-600">
                                {{ $report->database_version }}
                                <span class="ml-2 text-sm font-medium text-gray-500">
                                    {{ $report->config['db']['default'] }}
                                </span>
                            </div>
                        </dd>
                    </div>
                    
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">
                            OS Version
                        </dt>
                        <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-brand-600">
                                {{ $report->config['os']['name'] }} {{ $report->config['os']['release'] }}
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="my-8">
                <div class="grid grid-cols-2 gap-4">
                    <div class="overflow-hidden bg-white rounded-lg shadow">
                        <div class="px-3 pt-3 text-xs font-bold tracking-wider text-gray-400 uppercase">Tracked Packages</div>
                        <div class="px-6 py-2 text-sm text-gray-700 divide-y divide-gray-100 sm:p-4">
                            @foreach ($report->custom_package_versions as $package)
                            <div class="flex justify-between py-1">
                                <div>{{ $package['name'] }}</div>
                                @if ($package['version'])
                                <div>{{ $package['version'] }}</div>
                                @else
                                <div>&mdash;</div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @if ( $report->config['custom'] )
                        <div class="overflow-hidden bg-white rounded-lg shadow">
                            <div class="px-3 pt-3 text-xs font-bold tracking-wider text-gray-400 uppercase">Custom Data</div>
                            <div class="px-6 py-2 text-sm text-gray-700 divide-y divide-gray-100 sm:p-4">
                                @foreach ($report->config['custom'] as $key => $value)
                                    <div class="flex justify-between py-1">
                                        <div>{{ Str::of($key)->title()->replace('_', ' ') }}</div>
                                        @if (is_bool($value))
                                            @if ($value)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        @else
                                            <div>{{ $value }}</div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="my-8">
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="px-3 pt-3 text-xs font-bold tracking-wider text-gray-400 uppercase">Required Packages</div>
                    <div class="px-6 py-2 text-sm text-gray-700 divide-y divide-gray-100 sm:p-4">
                        @foreach ($report->packages as $package)
                            <div class="flex justify-between py-1">
                                <div>{{ $package->name }}</div>
                                <div>{{ $package->version }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
