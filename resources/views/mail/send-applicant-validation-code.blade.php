@component('mail::message')
# Your application code is here.

Hi there!
Please use the code below to finish signing your application.

<strong>{{ $applicant_code }}</strong>

{{__("Thank you for choosing URBE")}},<br>
{{ __("Admissions team at URBE University") }}
@endcomponent
