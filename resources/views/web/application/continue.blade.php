@extends('layouts.application')

@section('content')
    <div class="min-h-screen -my-12 flex items-center justify-center">
        <div class="text-center px-4 sm:px-6 lg:px-8">
            <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-44 md:w-56 mx-auto">
            <h2 class="mt-6 text-3xl font-bold text-slate-800 mx-auto text-center">{{__("Application Found!")}}</h2>
            <p class="mt-6 text-lg font-medium text-slate-700">{{ __("We have found your application. Please click the button below to continue the process.") }}</p>

            <div class="mt-8">
                <a href="{{ '/' . app()->getLocale() . '/start?application_id=' . $application }}" class="px-6 py-2 bg-sky-500/90 text-white rounded-full">{{__("Continue Application")}}</a>
            </div>

            <p class="mt-8 text-slate-700">{{ __("If you would like to restart your application instead, please click the link below.") }}</p>
            <form action="{{ route('application.restart') }}" method="post">
                @csrf
                <input type="hidden" name="application" value="{{ $application }}">
                <button class="mt-4 inline-block text-sm px-6 py-2 bg-slate-300 text-slate-900 rounded-md">{{ __("Start again") }}</button>
            </form>
            <p class="mt-4 text-sm text-red-600">{{ __("Please know that this will erase any progress made so far, and you will have to start from the beginning.") }}</p>
        </div>
    </div>
@endsection
