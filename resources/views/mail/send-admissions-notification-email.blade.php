@component('mail::message')
# A new application was just completed.

Login to the Admissions website to download the application.

<a href="{{ route('login') }}">Login here</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
