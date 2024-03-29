@extends('layouts.application')

@section('content')
    <div class="min-h-screen -my-12 flex items-center justify-center">
        <div class="text-center px-4 sm:px-6 lg:px-8">
            <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-44 md:w-56 mx-auto">
            <h2 class="mt-6 text-3xl font-bold text-slate-800 mx-auto text-center">{{__("Application Completed!")}}</h2>
            <p class="mt-6 text-lg font-medium text-slate-700">{{__("Your application has been sent and you should get a confirmation email shortly. If you have any addional questions, please contact us by dialing")}} <a href="tel:+18447448723" class="text-sky-500">+1 (844) 744-8723</a>.</p>
            <p class="mt-6 text-xs uppercase text-slate-700">{{__("Application ID: ") . $uuid}}</p>
            <div class="mt-8">
                <a href="https://www.urbe.university" target="_blank" class="px-6 py-2 bg-sky-500/90 text-white rounded-full">{{__("Continue to www.urbe.university")}}</a>
            </div>
        </div>
    </div>
@endsection
