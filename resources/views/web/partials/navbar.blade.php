<div class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 md:h-24">
            <div class="">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('urbe-logo.svg') }}" alt="" class="h-16 w-auto object-center object-contain">
                </a>
            </div>

            {{-- Apply Now button --}}
            <div class="hidden sm:block">
                <a  href="{{ route('application.start') }}" class="apply-btn">{{ __("Apply Now") }}</a>
            </div>
        </div>
    </div>
</div>
