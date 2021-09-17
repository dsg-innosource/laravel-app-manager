<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        {{$instance->name}}
        <div class="bg-gray-100">
            {{$env}}
        </div>
        @foreach ($getCustomPackageVersions as $package)
            <div class="flex justify-between">
                <div>{{ $package['name'] }}</div>
                <div>{{ $package['version'] }}</div>
            </div>
        @endforeach
    </div>
</div>