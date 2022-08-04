@component('mail::message')
# {{$application->first_name}}`s application signature request.

Hello there!

{{$application->first_name}} is almost done with {{ ($application->gender === 'female') ? 'her' : 'his' }} college application.

We only need you to sign your Guardian's Authorization so that the application is complete. Please click the button below to sign your consent.

Use the code below to sign:

{{ $application->legal_guardian_verification_code }}

@component('mail::button', ['url' => config('app.url') . '?application_id=' . $application->uuid])
Sign authorization
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
