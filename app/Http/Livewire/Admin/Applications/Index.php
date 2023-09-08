<?php

namespace App\Http\Livewire\Admin\Applications;

use App\Models\Application;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.admin.applications.index', [
            'applications' => Application::where('last_name', '%' . $this->search . '%')->paginate(25)
        ]);
    }
}
