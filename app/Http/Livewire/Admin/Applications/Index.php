<?php

namespace App\Http\Livewire\Admin\Applications;

use App\Models\Application;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.applications.index', [
            'applications' => Application::all()
        ]);
    }
}
