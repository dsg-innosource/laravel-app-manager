<div class="overflow-hidden bg-white shadow-sm sm:rounded-md">
    <div class="p-6 bg-white">
        <div class="font-semibold border-b border-gray-400">
            <a href="{{ route('instances.show', ['instance' => $instance]) }}" class="text-brand-700 hover:text-brand-500">{{$instance->name}}</a>
        </div>
        <div class="my-4 text-sm text-gray-700 divide-y divide-gray-100">
            @foreach ($getCustomPackageVersions as $package)
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
        <div class="flex justify-between text-xs">
            <div>
                @if($env)
                    <div class="rounded-md px-2 py-px uppercase tracking-wider bg-{{$env->color}}-200 text-{{$env->color}}-800">{{$env->name}}</div>
                @endif
            </div>
            <div class="text-gray-600">{{ $formattedLatestReportCreatedAt }}</div>
        </div>
    </div>
</div>