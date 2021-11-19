<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $instance->name }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-8">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Last Check In: <span class="font-bold">{{ $instance->latest_report->created_at->diffForHumans() }}</span>
                </h3>
                <dl class="grid grid-cols-1 mt-5 overflow-hidden bg-white divide-y divide-gray-200 rounded-lg shadow md:grid-cols-3 md:divide-y-0 md:divide-x">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">
                            PHP Version
                        </dt>
                        <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-brand-600">
                                {{ $instance->latest_report->php_version }}
                            </div>
                        </dd>
                    </div>
                    
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">
                            DB Version
                        </dt>
                        <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-brand-600">
                                {{ $instance->latest_report->database_version }}
                                <span class="ml-2 text-sm font-medium text-gray-500">
                                    {{ $instance->latest_report->config['db']['default'] }}
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
                                {{ $instance->latest_report->config['os']['name'] }} {{ $instance->latest_report->config['os']['release'] }}
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="my-8">
                <div class="grid grid-cols-2 gap-4">
                    <div class="overflow-hidden bg-white rounded-lg shadow">
                        <div class="px-3 pt-3 text-xs tracking-widest text-gray-400 uppercase">Tracked Packages</div>
                        <div class="px-6 py-2 text-sm text-gray-700 divide-y divide-gray-100 sm:p-4">
                            @foreach ($instance->latest_report->custom_package_versions as $package)
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
                    @if ( $instance->latest_report->config['custom'] )
                        <div class="overflow-hidden bg-white rounded-lg shadow">
                            <div class="px-3 pt-3 text-xs tracking-widest text-gray-400 uppercase">Custom Data</div>
                            <div class="px-6 py-2 text-sm text-gray-700 divide-y divide-gray-100 sm:p-4">
                                @foreach ($instance->latest_report->config['custom'] as $key => $value)
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
            <div class="flex flex-col">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Recent Reports:
                </h3>
                <div class="mt-5 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Date <small>(UTC)</small>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            PHP Version
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            DB Version
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            OS Version
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Details</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Odd row -->
                                    @foreach($instance->recent_reports as $report)
                                        @if($loop->even)
                                            <tr class="text-gray-500 bg-white hover:text-gray-600 hover:bg-gray-100">
                                            @else
                                            <tr class="text-gray-500 bg-gray-50 hover:text-gray-600 hover:bg-gray-100">
                                                @endif
                                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                                    {{ $report->created_at->format('M jS, h:i:s A') }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                                    {{ $report->php_version }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                                    {{ $report->database_version }} &mdash; {{ $report->config['db']['default'] }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                                    {{ $report->config['os']['name'] }} {{ $report->config['os']['release'] }}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <a href="{{ route('reports.show', ['instance' => $instance->id, 'report' => $report->id]) }}" class="text-brand-600 hover:text-brand-900">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
