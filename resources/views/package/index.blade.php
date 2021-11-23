<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Packages
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach($packages as $package)
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-md">
                        <div class="p-6 bg-white">
                            <div class="font-semibold border-b border-gray-400">
                                <a href="{{ route('packages.show', ['package' => $package[0]['name']]) }}" class="text-brand-700 hover:text-brand-500">{{$package[0]['name']}}</a>
                            </div>
                            <div class="my-4 text-sm text-gray-700 divide-y divide-gray-100">
                                @foreach ($package as $packageVersion)
                                    <div class="flex justify-between py-1">
                                        <div>{{ $packageVersion['version'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
