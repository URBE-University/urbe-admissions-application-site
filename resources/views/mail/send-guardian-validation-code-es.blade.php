@component('mail::message')
Hola!

{{$application->first_name}} está por terminar su aplicacion de admisión a URBE University.

Necesitamos que firme su autorización de tutor legal para que la aplicacion esté completa. Por favor, haga clic en el botón de abajo para firmar su consentimiento.

Utilice el siguiente código para firmar:

{{ $application->legal_guardian_verification_code }}

@component('mail::button', ['url' => config('app.url') . '/es/start?application_id=' . $application->uuid . '&guardian=' . $application->legal_guardian_email])
Firmar autorización
@endcomponent

Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent
