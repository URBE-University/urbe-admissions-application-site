<?php

namespace App\Http\Livewire\Settings;

use App\Models\Concentration;
use Livewire\Component;

class EditConcentration extends Component
{
    public $modal, $concentration, $name;

    public function modal(Concentration $concentration)
    {
        $this->concentration = $concentration;
        $this->name = $this->concentration->name;
    }

    public function save()
    {
        $this->concentration->update([
            'name' => $this->name
        ]);
        return redirect()->route('settings', ['language' => 'en']);
    }
    public function render()
    {
        return view('livewire.settings.edit-concentration');
    }
}
