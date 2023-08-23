<?php

namespace App\Http\Livewire\Application;

use App\Models\Degree;
use App\Models\Program;
use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProgramOfInterest extends Component
{
    public $application, $uuid, $degree, $degrees, $program, $programs, $concentration, $concentrations, $start_date, $program_format, $program_language;

    public function mount()
    {
        if (! isset($this->uuid)) {
            return redirect()->to('/');
        }
        $this->application = Application::where('uuid', $this->uuid)->first();
    }

    public function save()
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
                'step' => 4,
                'degree' => $this->degree,
                'program' => $this->program,
                'concentration' => $this->concentration,
                'start_date' => $this->start_date,
                'program_format' => $this->program_format,
                'program_language' => $this->program_language,
                'lang' => app()->getLocale()
            ]);
            DB::table('application_log')->insert([
                'application_id' => $this->application->id,
                'description' => 'Program of interest completed.'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->uuid);
    }

    public function render()
    {
        $this->degrees = Degree::all();
        $this->programs = Degree::where('name', $this->degree)->first()->programs ?? null;
        $this->concentrations = Program::where('name', $this->program)->first()->concentrations ?? null;

        return view('livewire.application.program-of-interest');
    }
}
