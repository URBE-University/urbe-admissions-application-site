<?php

namespace App\Http\Livewire\Admin\Applications;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Log extends Component
{
    public $application, $modal;
    public function mount($application)
    {
        $this->application = $application;
    }

    public function render()
    {
        return view('livewire.admin.applications.log', [
            'logs' => DB::table('application_log')->where('application_id', $this->application)->orderBy('created_at', 'DESC')->get()
        ]);
    }
}
