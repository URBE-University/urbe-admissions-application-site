@component('mail::message')
# URBE University Application

{{__("Hi there!")}} 👋!

{{__("Thank you for applying for admissions at URBE University. Your application has been saved. You can continue where you left off by clicking the button below.")}}

@component('mail::button', ['url' => $url])
{{__("Continue application")}}
@endcomponent

{{__("Thank you for choosing URBE")}},<br>
{{ __("Admissions team at URBE University") }}
@endcomponent
