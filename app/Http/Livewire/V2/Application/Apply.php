<?php

namespace App\Http\Livewire\V2\Application;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Apply extends Component
{
    public function render()
    {
        return view('livewire.v2.application.apply')
            ->layout('layouts.guest');
    }

    /**
     * Pull available programs from Campus Cafe
     */
    public function getPrograms()
    {
        $endpoint = "https://urb-web.scansoftware.com/cafeweb/public/openAPI/v1/values?portalConfig=apiapplication&fieldName=majorCode";
        return Http::get($endpoint)->json();
    }
}
