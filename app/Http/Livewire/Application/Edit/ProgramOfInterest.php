<?php

namespace App\Http\Livewire\Application\Edit;

use App\Models\Degree;
use App\Models\Program;
use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Log;

class ProgramOfInterest extends Component
{
    public $editModal, $uuid, $application, $degree, $program, $concentration, $start_date, $program_format, $program_language;

    public function mount()
    {
        $this->application = Application::where('uuid', $this->uuid)->first();
        $this->start_date = $this->application->start_date;
        $this->program_format = $this->application->program_format;
        $this->program_language = $this->application->program_language;
    }

    public function update()
    {
        $this->validate([
            'degree' => 'required',
            'program' => 'required',
            'start_date' => 'required|date',
            'program_format' => 'required',
            'program_language' => 'required',
        ]);

        try {
            $this->application->update([
                'degree' => $this->degree,
                'program' => $this->program,
                'concentration' => $this->concentration,
                'start_date' => $this->start_date,
                'program_format' => $this->program_format,
                'program_language' => $this->program_language,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->application->uuid);
    }

    public function render()
    {
        $this->degrees = Degree::all();
        $this->programs = Degree::where('name', $this->degree)->first()->programs ?? null;
        $this->concentrations = Program::where('name', $this->program)->first()->concentrations ?? null;
        return view('livewire.application.edit.program-of-interest');
    }
}
