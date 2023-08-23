@extends('layouts.application')

@section('content')
    @livewire('application.' . $form_step_text, ['uuid' => $uuid])
@endsection
