<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        {{$instance->name}}
        <div class="bg-gray-100">
            {{$env}}
        </div>
        @if($instance->latest_report->composer_versions['psy/psysh'])
            {{$instance->latest_report->composer_versions['psy/psysh']}}
        @endif
    </div>
</div>