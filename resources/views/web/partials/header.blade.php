<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 items-center gap-12 text-slate-800">
            <div class="col-span-2 md:col-span-1">
                <div class="prose-lg text-center md:text-left">
                    <h1 class="font-extrabold text-[#073260]">{{ __("Begin your dream now!") }}</h1>
                    <p>{{ __("Supercharge your future with a degree from URBE University. We work closely with you to ensure you are well-informed throughout your application process. Start your application today, or give us a call. We are ready for you.") }}</p>
                </div>
                <div class="mt-10 md:flex items-center justify-center md:justify-start gap-6">
                    <a  href="{{ route('web.v2.apply', app()->getLocale()) }}" class="block text-center apply-btn">{{ __("Apply Now") }}</a>
                    <a  target="_blank" href="https://outlook.office365.com/owa/calendar/MeetwithURBEUniversity@urbe.university/bookings/s/V--khBDgG0qSCQI80T7Nyw2"
                        class="mt-6 md:mt-0 block text-center font-medium">{{__("Talk to admissions")}}</a>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1">
                <img src="{{ asset('students.webp') }}" alt="Image of students smiling"
                    class="object-center object-cover w-full aspect-video md:aspect-square rounded-xl">
            </div>
        </div>
    </div>
</div>
