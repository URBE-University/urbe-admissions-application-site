<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose-lg text-center">
            <h2 class="font-bold text-[#073260]">{{ __("What is the application process like?") }}</h2>
        </div>

        <div class="mt-12 grid grid-cols-2 gap-8">
            {{-- Gather documentation --}}
            <div class="col-span-2 md:col-span-1 px-8 py-12 w-full hover:bg-sky-50 hover:border-sky-50 border border-slate-300 rounded-xl group group-hover:bg-sky-50 transition-colors">
                <div class="inline-block text-xs text-sky-800 font-medium tracking-wide uppercase px-3 py-1 bg-sky-100 rounded-xl group-hover:bg-white">1. {{__("Prepare")}}</div>
                <div class="mt-6">
                    <h3 class="text-2xl font-bold text-[#073260]">{{__("Review your requirements")}}</h3>
                    <p class="mt-3 text-lg">{{__("Before you start your application, please take a moment to review your program-specific requirements.")}}</p>
                </div>
                <div class="mt-6 sm:flex items-center gap-8 text-lg">
                    <a href="{{ asset('Entrance-Requirements-Bachelors.pdf') }}" target="_blank" class="inline-flex items-center gap-2 text-base text-sky-800 hover:-translate-y-1 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd" />
                        </svg>
                        <span>{{__("Bachelor's requirements")}}</span>
                    </a>
                    <a href="{{ asset('Entrance-Requirements-Masters.pdf') }}" target="_blank" class="inline-flex items-center gap-2 text-base text-sky-800 hover:-translate-y-1 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd" />
                        </svg>
                        <span>{{__("Master's requirements")}}</span>
                    </a>
                </div>
            </div>

            {{-- Fill out application --}}
            <div class="col-span-2 md:col-span-1 px-8 py-12 w-full hover:bg-sky-50 hover:border-sky-50 border border-slate-300 rounded-xl group group-hover:bg-sky-50 transition-colors">
                <div class="inline-block text-xs text-sky-800 font-medium tracking-wide uppercase px-3 py-1 bg-sky-100 rounded-xl group-hover:bg-white">2. {{__("Apply")}}</div>
                <div class="mt-6">
                    <h3 class="text-2xl font-bold text-[#073260]">{{__("Fill out your application")}}</h3>
                    <p class="mt-3 text-lg">{{__("Once you have all the necessary documents and information, start by completing your online application to URBE University.")}}</p>
                </div>
                <div class="mt-8">
                    <a href="{{ route('application.start', app()->getLocale()) }}" class="px-6 py-3 font-medium rounded-xl bg-sky-500 text-white transition-all outline-0">{{ __("Apply Now") }}</a>
                </div>
            </div>

            {{-- Application review --}}
            <div class="col-span-2 md:col-span-1 px-8 py-12 w-full hover:bg-sky-50 hover:border-sky-50 border border-slate-300 rounded-xl group group-hover:bg-sky-50 transition-colors">
                <div class="inline-block text-xs text-sky-800 font-medium tracking-wide uppercase px-3 py-1 bg-sky-100 rounded-xl group-hover:bg-white">3. {{__("Get admitted")}}</div>
                <div class="mt-6">
                    <h3 class="text-2xl font-bold text-[#073260]">{{__("Application review")}}</h3>
                    <p class="mt-3 text-lg">{{__("After you submit your application, it will be reviewed by our Admissions and Academic departments, and you should be hearing back from us within 24 hours of your application. If you have any questions, please schedule a call with our Admissions team.")}}</p>
                </div>
            </div>

            {{-- Meet with advisor --}}
            <div class="col-span-2 md:col-span-1 px-8 py-12 w-full hover:bg-sky-50 hover:border-sky-50 border border-slate-300 rounded-xl group group-hover:bg-sky-50 transition-colors">
                <div class="inline-block text-xs text-sky-800 font-medium tracking-wide uppercase px-3 py-1 bg-sky-100 rounded-xl group-hover:bg-white">4. {{__("Tuition and aid")}}</div>
                <div class="mt-6">
                    <h3 class="text-2xl font-bold text-[#073260]">{{__("Meet with your financial and academic advisors")}}</h3>
                    <p class="mt-3 text-lg">{{__("Once you are admitted, we will coordinate meetings with your academic and financial advisors, so that they can go over your classes schedule, and financial responsibilities respectively.")}}</p>
                </div>
            </div>

            {{-- Onboard and start classes --}}
            <div class="col-span-2 px-8 py-12 w-full hover:bg-sky-50 hover:border-sky-50 border border-slate-300 rounded-xl group group-hover:bg-sky-50 transition-colors">
                <div class="inline-block text-xs text-sky-800 font-medium tracking-wide uppercase px-3 py-1 bg-sky-100 rounded-xl group-hover:bg-white">5. {{__("Onboard and Go")}}</div>
                <div class="mt-6">
                    <h3 class="text-2xl font-bold text-[#073260]">{{__("Start classes on the next academic period")}}</h3>
                    <p class="mt-3 text-lg">{{__("Congratulations! You are now officially ready to start classes at URBE University. At this point, you will receive information about how to navigate URBE's learning environments. With this you will be ready to start on the next academic period.")}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
