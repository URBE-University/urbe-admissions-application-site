@extends('layouts.application')

<div class="max-w-7xl mx-auto">
    @section('content')
        @livewire('application.' . $form_step_text, ['uuid' => $uuid])
    @endsection
</div>
