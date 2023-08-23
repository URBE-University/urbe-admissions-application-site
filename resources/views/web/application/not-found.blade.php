@extends('layouts.application')

@section('content')
    <div class="grid grid-cols-6 gap-8">
        {{-- Left side navigation panel --}}
        <div class="hidden lg:block lg:col-span-3 p-24">
            <div class="h-full flex items-center justify-center">
                <div class="text-center">
                    <img src="https://admissions.urbe.university/wp-content/uploads/2019/04/logo-urbe-university.png" alt="">
                    <h2 class="text-4xl font-extrabold text-slate-800">{{__("Admissions Application")}}</h2>
                </div>
            </div>
        </div>

        {{-- Right side content panel --}}
        <div class="col-span-6 lg:col-span-3 bg-white min-h-screen border-l shadow-lg p-4 sm:p-6 lg:p-24">
            <div class="h-full flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-slate-800">{{__("Sorry! We could not find your application.")}}</h2>
                    <div class="mt-6">
                        <a href="/" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            {{__("Start a new application")}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
