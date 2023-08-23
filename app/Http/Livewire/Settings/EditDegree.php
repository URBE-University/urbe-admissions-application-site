<?php

namespace App\Http\Livewire\Settings;

use App\Models\Degree;
use Livewire\Component;

class EditDegree extends Component
{
    public $modal, $degree, $name;

    public function modal(Degree $degree)
    {
        $this->degree = $degree;
        $this->name = $this->degree->name;
    }

    public function save()
    {
        $this->degree->update([
            'name' => $this->name
        ]);
        return redirect()->route('settings', ['language' => 'en']);
    }

    public function render()
    {
        return view('livewire.settings.edit-degree');
    }
}
