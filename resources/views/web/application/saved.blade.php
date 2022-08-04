@extends('layouts.application')

@section('content')
    <div class="text-center px-4 sm:px-6 lg:px-8">
        <img src="https://admissions.urbe.university/wp-content/uploads/2019/04/logo-urbe-university.png" alt="URBE University logo" class="w-1/2 md:w-1/3 mx-auto">
        <h2 class="mt-4 text-3xl font-bold text-slate-800 mx-auto text-center">{{__("Application saved!")}}</h2>
        <p class="mt-4 font-semibold text-slate-700">{{__("Please check your inbox. We sent you an email with your application link so that you can finish it later.")}}</p>
        <a href="/" class="mt-6 inline-flex">{{__("Exit and continue later")}}</a>
        <a href="/start" class="sm:ml-6 mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            {{__("Start a new application")}}
        </a>
    </div>
@endsection
