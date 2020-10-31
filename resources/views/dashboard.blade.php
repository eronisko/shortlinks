<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        Your links
                    </div>

                    <div class="mt-6 divide-y">
                        @foreach ($shortlinks as $shortlink)
                        <div class="py-3">
                            <time class="block text-gray-400 text-sm">{{ $shortlink->created_at->toDateString() }}</time>
                            <h3 class="font-semibold">
                                <a href="{{ route('shortlink.show', $shortlink) }}">
                                    {{-- strip off scheme (https://) --}}
                                    {{ Str::replaceFirst(Request::getScheme() . '://', '', route('shortlink.show', $shortlink)) }}
                                </a>
                            </h3>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
