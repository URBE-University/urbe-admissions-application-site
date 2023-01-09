<?php

namespace App\Http\Livewire\System;

use App\Models\Program;
use Livewire\Component;
use App\Models\Concentration;
use App\Models\Degree;
use Illuminate\Support\Facades\Log;

class Settings extends Component
{
    public $degree, $degrees, $program, $programs, $concentration, $concentrations;

    public function mount()
    {
        $this->degrees = Degree::all();
        $this->programs = Program::all();
        $this->concentrations = Concentration::all();
    }

    public function addDegree()
    {
        $this->validate([
            'degree' => ['required', 'unique:degrees,name']
        ]);

        try {
            Degree::create([
                'name' => $this->degree,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->route('settings', ['language' => 'en']);
    }

    public function delDegree($degree)
    {
        $degree = Degree::find($degree);
        foreach ($degree->programs as $program) {
            $program->concentrations()->delete();
        }
        $degree->programs()->delete();
        $degree->delete();
        return redirect()->route('settings', ['language' => 'en']);
    }

    public function addProgram()
    {
        $this->validate([
            'degree' => 'required',
            'program' => ['required', 'unique:programs,name']
        ]);

        try {
            Program::create([
                'degree_id' => $this->degree,
                'name' => $this->program,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->route('settings', ['language' => 'en']);
    }

    public function delProgram($program)
    {
        $program = Program::find($program);
        $program->concentrations()->delete();
        $program->delete();
        return redirect()->route('settings', ['language' => 'en']);
    }

    public function addConcentration()
    {
        $this->validate([
            'program' => 'required',
            'concentration' => 'required',
        ]);

        try {
            Concentration::create([
                'program_id' => $this->program,
                'name' => $this->concentration,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->route('settings', ['language' => 'en']);
    }

    public function delConcentration($concentration)
    {
        Concentration::find($concentration)->delete();
        return redirect()->route('settings', ['language' => 'en']);
    }

    public function render()
    {
        return view('livewire.system.settings');
    }
}
