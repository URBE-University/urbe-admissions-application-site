<div class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 md:h-24">
            <div class="">
                <a href="{{ route('home', app()->getLocale()) }}" title="URBE logo link">
                    <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo image" class="h-16 w-auto object-center object-contain">
                </a>
            </div>

            {{-- Apply Now button --}}
            <div class="flex items-center space-x-6">
                @livewire('lang-switcher')
                {{-- <a  href="{{ route('application.start', app()->getLocale()) }}" class="hidden sm:block apply-btn">{{ __("Apply Now") }}</a> --}}
                <a  href="{{ route('web.v2.apply', app()->getLocale()) }}" class="hidden sm:block apply-btn">{{ __("Apply Now") }}</a>
            </div>
        </div>
    </div>
</div>
