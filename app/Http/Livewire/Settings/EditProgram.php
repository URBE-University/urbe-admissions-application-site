<?php

namespace App\Http\Livewire\Settings;

use App\Models\Program;
use Livewire\Component;

class EditProgram extends Component
{
    public $modal, $program, $name;

    public function modal(Program $program)
    {
        $this->program = $program;
        $this->name = $this->program->name;
    }

    public function save()
    {
        $this->program->update([
            'name' => $this->name
        ]);
        return redirect()->route('settings', ['language' => 'en']);
    }
    public function render()
    {
        return view('livewire.settings.edit-program');
    }
}
